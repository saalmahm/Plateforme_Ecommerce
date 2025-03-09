<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        $user = Auth::user();
        $panier = $user->panier;

        // Check if cart is empty
        if (!$panier || $panier->produits->isEmpty()) {
            return redirect()->route('client.panier')->with('error', 'Votre panier est vide.');
        }

        // Calculate total
        $total = $panier->produits->sum(function ($produit) {
            return $produit->prix * $produit->pivot->quantity;
        });

        // Create order
        $commande = Commande::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Attach products to order
        foreach ($panier->produits as $produit) {
            $commande->produits()->attach($produit->id, [
                'quantity' => $produit->pivot->quantity,
                'price' => $produit->prix,
            ]);
        }

        return view('payment', compact('commande'));
    }

    public function processPayment(Request $request)
    {
        $commande = Commande::findOrFail($request->commande_id);

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            // Create Stripe charge
            $charge = Charge::create([
                'amount' => $commande->total * 100,
                'currency' => 'MAD',
                'source' => $request->stripeToken,
                'description' => 'Commande #' . $commande->id,
            ]);

            // Update order status
            $commande->update(['status' => 'payé']);

            // Save payment
            Paiement::create([
                'commande_id' => $commande->id,
                'montant' => $commande->total,
                'transaction_id' => $charge->id,
            ]);

            // Clear cart
            $commande->user->panier->produits()->detach();

            return redirect()->route('client.produits')->with('success', 'Paiement réussi !');

        } catch (CardException $e) {
            $errorMessage = $this->getCardErrorMessage($e->getDeclineCode() ?? $e->getCode());
            return back()->withErrors($errorMessage);
        } catch (\Exception $e) {
            return back()->withErrors('Erreur lors du paiement : ' . $e->getMessage());
        }
    }
    private function getCardErrorMessage($declineCode)
    {
        switch ($declineCode) {
            case 'stolen_card':
                return 'Your card was declined because it was reported as stolen. Please use a different card.';
            case 'insufficient_funds':
                return 'Your card was declined due to insufficient funds. Please use a different card or add funds to your account.';
            case 'expired_card':
                return 'Your card was declined because it has expired. Please use a different card.';
            case 'card_declined':
                return 'Your card was declined. Please check your card details or use a different card.';
            default:
                return 'Your card was declined. Please try again or use a different card.';
        }
    }
}
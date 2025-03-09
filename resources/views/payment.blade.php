@extends('client.layout')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Payment Title -->
    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Complete Your Payment</h2>

    <!-- Display Payment Errors -->
    @if ($errors->any())
    <div class="mb-6 max-w-2xl mx-auto">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <!-- Payment Card -->
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <!-- Payment Details -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Payment Details</h3>
            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-gray-700">
                    <span class="font-medium">Articles:</span>
                    {{ $commande->produits->count() }} produits
                </p>
                <p class="text-gray-700">
                    <span class="font-medium">Total:</span>
                    {{ number_format($commande->total, 2, ',', ' ') }} MAD
                </p>
            </div>
        </div>

        <!-- Payment Form -->
        <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
            @csrf
            <input type="hidden" name="commande_id" value="{{ $commande->id }}">
            <input type="hidden" name="amount" value="{{ $commande->total }}">
        
            <!-- Card Details -->
            <div class="mb-6">
                <label for="card-element" class="block text-sm font-medium text-gray-700 mb-2">
                    Credit or Debit Card
                </label>
                <div id="card-element" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300">
                    <!-- A Stripe Element will be inserted here. -->
                </div>
                <div id="card-errors" role="alert" class="text-sm text-red-600 mt-2"></div>
            </div>
        
            <!-- Pay Now Button -->
            <div class="flex justify-end">
                <button type="submit" id="submit-button" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition duration-300 flex items-center">
                    <span id="button-text">Pay Now</span>
                    <span id="button-spinner" class="ml-2 hidden">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ config('services.stripe.key') }}');
    var elements = stripe.elements();

    // Customize Stripe Elements
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', { style: style });
    card.mount('#card-element');

    // Handle real-time validation errors
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    var submitButton = document.getElementById('submit-button');
    var buttonSpinner = document.getElementById('button-spinner');
    var buttonText = document.getElementById('button-text');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Disable the submit button to prevent multiple submissions
        submitButton.disabled = true;
        buttonText.classList.add('hidden');
        buttonSpinner.classList.remove('hidden');

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Show errors to the customer
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;

                // Re-enable the submit button
                submitButton.disabled = false;
                buttonText.classList.remove('hidden');
                buttonSpinner.classList.add('hidden');
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class StockController extends Controller
{
    public function index()
    {
        $stockData = Produit::all(); 

        return view('admin.gestion_stock', ['stockData' => $stockData]);
    }

}

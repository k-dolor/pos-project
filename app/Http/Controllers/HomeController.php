<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Models\PaymentTransaction; // Import the Transaction model

class HomeController extends Controller
{
    public function home()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalTransactions = PaymentTransaction::count();

        return view('home', compact('totalUsers', 'totalProducts', 'totalSuppliers', 'totalTransactions'));
    }
}

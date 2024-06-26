<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;


class HomeController extends Controller
{

    public function home()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();

        return view('home', compact('totalUsers', 'totalProducts', 'totalSuppliers'));
    }
}


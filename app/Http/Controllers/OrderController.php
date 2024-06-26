<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $cartItems = $request->session()->get('cart', []);
        // Process the order here (e.g., save to database, reduce stock, send confirmation email, etc.)
        // Clear the cart
        $request->session()->forget('cart');
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }

}

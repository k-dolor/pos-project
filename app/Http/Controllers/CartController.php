<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\PaymentTransaction;
use App\Models\Discount;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showProduct()
    {
        $products = Product::all();
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $totalPrice = $cartItems->sum('total');

        return view('cart.add_order', compact('products', 'cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        if (!$product) {
            return redirect()->route('cart')->with('error', 'Product not found.');
        }

        $quantity = $request->input('quantity');
        $discount = $request->input('discount', 0);

        $totalPrice = ($product->price * $quantity) - (($product->price * $quantity) * $discount / 100);

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->product_id,
            'quantity' => $quantity,
            'total' => $totalPrice,
            'discount' => $discount,
        ]);

        $product->stock -= $quantity;
        $product->save();

        return redirect()->route('cart');
    }


    public function removeFromCart($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $product = $cartItem->product;
            $product->stock += $cartItem->quantity;
            $product->save();

            $cartItem->delete();
        }

        return redirect()->route('cart');
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $totalAmount = $cartItems->sum('total');
        $totalDiscount = $cartItems->sum(function($item) {
            return ($item->product->price * $item->quantity) * $item->discount / 100;
        });
        $payableAmount = $totalAmount - $totalDiscount;

        // Clear the cart
        Cart::where('user_id', Auth::id())->delete();

        session([
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'totalDiscount' => $totalDiscount,
            'payableAmount' => $payableAmount,
        ]);

        return view('cart.checkout', compact('cartItems', 'totalAmount', 'totalDiscount', 'payableAmount'));
    }

    public function receipt(Request $request)
    {
        $cartItems = session('cartItems');
        $totalAmount = session('totalAmount');
        $totalDiscount = session('totalDiscount');
        $payableAmount = session('payableAmount');
        $amountPaid = $request->input('amount_paid');
        $change = $request->input('change');

        if (is_null($cartItems)) {
            return redirect()->route('cart')->with('error', 'No items in the cart.');
        }

        // Determine the discount_id based on whether there is any discount
        $discountId = $totalDiscount > 0 ? 2 : 1;

        // Add record to payment_transactions table
        PaymentTransaction::create([
            'user_id' => Auth::id(),
            'payment_method_id' => 1, // Assuming 1 is the default payment method
            'discount_id' => $discountId,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return view('cart.receipt', compact('cartItems', 'totalAmount', 'totalDiscount', 'payableAmount', 'amountPaid', 'change'));
    }
}

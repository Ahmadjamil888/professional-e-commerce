<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display the user's cart.
     */
    public function index()
    {
        $userId = Auth::id();

        $items = CartItem::with('product')
                    ->where('user_id', $userId)
                    ->get();

        $total = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart', compact('items', 'total'));
    }

    /**
     * Add product to cart or increase its quantity.
     */
    public function add(Request $request, $productId)
    {
        $userId = Auth::id();
        $product = Product::findOrFail($productId);

        $cartItem = CartItem::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    /**
     * Update item quantity in cart.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart item updated.');
    }

    /**
     * Remove item from cart.
     */
    public function remove($id)
    {
        $cartItem = CartItem::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    /**
     * Clear the entire cart.
     */
    public function clear()
    {
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Cart cleared.');
    }
}

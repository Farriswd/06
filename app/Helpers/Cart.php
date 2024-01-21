<?php


namespace App\Helpers;


use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;

class Cart {
    public static function getCount() {
        $user = auth()->user();
            return CartItem::whereUserId($user->id)->count(); // sum('quantity') - Если нужно чтобы кол во товаров в корзине считало по сумированом колву каждого
    }

    public static function getCartItems() {
        $user = auth()->user();
        return CartItem::whereUserId($user->id)->get()->map(fn(CartItem $item) => ['product_id' => $item->product_id, 'quantity' => (int)$item->quantity]);
    }


    public static function getProductsAndCartItems() {
        $cartItems = self::getCartItems();
        $ids = Arr::pluck($cartItems, 'product_id');
        $products = Product::whereIn('id', $ids)->get();
        $cartItems = Arr::keyBy($cartItems, 'product_id');

        return [$products, $cartItems];
    }
}

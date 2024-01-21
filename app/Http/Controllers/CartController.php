<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\CartItem;
use App\Models\GameBillingPaidItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $cartItems = $user->cartItems;
        if ($cartItems->count() > 0)  return inertia('Shop/Cart');
        return redirect()->back()->with('info', 'Your cart is empty!');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'id' => 'required|integer|exists:products,id',
            'quantity' => 'required',
        ]);

        $user = $request->user();

        $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $data['id']])->first();
        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => $user->id,
                'product_id' => $data['id'],
                'quantity' => $data['quantity']
            ]);
        }
        return redirect()->back()->with('success', 'Success');
    }

    public function update(Request $request, Product $product) {
        $quantity = $request->integer('quantity');
        $user = $request->user();
        CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);
        return redirect()->back()->with('success', true);
    }

    public function delete(Request $request, Product $product) {
        $user = $request->user();

        CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()?->delete();
        if (CartItem::count() <= 0) return redirect()->route('index')->with('info', 'Your Cart is empty');
        return redirect()->back()->with('success', true);
    }

    public function checkout(CheckoutRequest $request) {
        $data = $request->validated();
        $user = $request->user();

        if ($user->balance < $data['total']) return redirect()->back()->with('error', 'You dont have enough SA');

        /**
         * Preparing arrays for merge
         */
        $carts = $data['carts'] ?? [];
        $products = $data['products'] ?? [];
        $total = $data['total'] ?? [];
        $mergedData = [];

        /**
         * Merge array $carts (cart_items) with $products
         */
        foreach ($carts as $cartItem) {
            foreach ($products as $product) {
                if ($cartItem['product_id'] == $product['id']){
                    $mergedData[] = array_merge($cartItem, ['title' => $product['title'], 'price' => $product['price']]);
                }
            }
        }

        $order = Order::create([
            'total_price' => $total,
            'status' => 'new',
            'user_id' => $user->id
        ]);

        if (!$order) return redirect()->back()->with('error', 'Could not create an order');

        foreach ($mergedData as $cart) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cart['product_id'],
                'quantity' => $cart['quantity'],
                'unit_price' => $cart['price']
            ]);
        }

        CartItem::where(['user_id' => $user->id])->delete();

        foreach ($order->orderItems as $paidItem) {
            $result = GameBillingPaidItem::create([
                'buy_id' => $order->id,
                'account_id' => $user->game_account_id,
                'avatar_id' => 0,
                'avatar_name' =>'',
                'server_name' => 'Rappelz',
                'taken_account_id' => $user->game_account_id,
                'taken_avatar_id' => 0,
                'taken_server_name' => '',
                'item_code' => $paidItem->product->game_item_id,
                'item_count' => $paidItem->quantity,
                'type' => 1,
                'rest_item_count' => $paidItem->quantity,
                'confirmed' => 1,
                'confirmed_time' => '9999-12-31 00:00:00.000',
                'bought_time' => Carbon::now(),
                'valid_time' => '9999-12-31 00:00:00.000',
                'taken_time' => '9999-12-31 00:00:00.000',
                'isCancel' => 0
            ]);
            if (!$result) {
                $order->status = 'error';
                $order->save();
                return abort(500);
            }
        }

        $balanceRest = $user->balance - $order->total_price;
        $user->balance = $balanceRest;
        $user->save();
        return redirect()->route('index')->with('success', 'Your order was complete successfully');
    }
}

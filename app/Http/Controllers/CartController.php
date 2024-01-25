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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

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
        return response()->json(['success' => true]);
    }

    public function update(Request $request, Product $product) {
        $quantity = $request->integer('quantity');
        $user = $request->user();
        CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]);
        return response()->json(['success' => true]);
    }

    public function delete(Request $request, Product $product) {
        $user = $request->user();

        CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()?->delete();
        if (CartItem::count() <= 0) return response()->json(['redirect' => true]);
        return response()->json(['success' => true]);
    }

    public function checkout(CheckoutRequest $request) {
        $data = $request->validated();
        $user = $request->user();

        try {
            DB::beginTransaction();
            /**
             * Preparing arrays for merge
             * @param $cartProducts
             * Getting products info from db based on their ids in $carts
             */
            // Получение информации о товарах из базы данных на основе их идентификаторов в $carts
            $cartProducts = Product::whereIn('id', array_column($data['carts'], 'product_id'))->get();
            // Проверка, что количество товаров в $carts совпадает с количеством товаров в $products
            if (count($data['carts']) !== count($cartProducts)) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Invalid data: The number of products in the cart does not match the expected quantity.');
            }

            $total = 0;
            $mergedData = [];

            /**
             * Merge array $carts (cart_items) with $products
             */
            foreach ($data['carts'] as $cartItem) {
                $product = $cartProducts->where('id', $cartItem['product_id'])->first();

                if (!$product) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Invalid data: Product information not found.');
                }

                $mergedData[] = [
                    'product_id' => $product->id,
                    'quantity' => $cartItem['quantity'],
                    'title' => $product->title,
                    'price' => (int) $product->price,
                    'game_item_id' => $product->game_item_id
                ];
            }

            foreach ($mergedData as $item) {
                $total += $item['quantity'] * $item['price'];
            }

            if ($user->balance < $total) {
                DB::rollBack();
                return redirect()->back()->with('error', 'You dont have enough SA');
            }

            $order = Order::create([
                'total_price' => $total,
                'status' => 'new',
                'user_id' => $user->id
            ]);

            if ($order === false) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Could not create an order');
            }

            $orderItems = [];

            foreach ($mergedData as $cart) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $cart['product_id'],
                    'quantity' => $cart['quantity'],
                    'unit_price' => $cart['price']
                ];
            }


            $orderItemsBilling = OrderItem::insert($orderItems);

            if ($orderItemsBilling === false) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Could not resolve an order items');
            }

            CartItem::where('user_id' , $user->id)->delete();

            $paidItems = [];

            foreach ($mergedData as $paidItem) {
                $paidItems[] =[
                    'buy_id' => $order->id,
                    'account_id' => $user->game_account_id,
                    'avatar_id' => 0,
                    'avatar_name' =>'',
                    'server_name' => 'Rappelz',
                    'taken_account_id' => $user->game_account_id,
                    'taken_avatar_id' => 0,
                    'taken_server_name' => '',
                    'item_code' => $paidItem['game_item_id'],
                    'item_count' => $paidItem['quantity'],
                    'type' => 1,
                    'rest_item_count' => $paidItem['quantity'],
                    'confirmed' => 1,
                    'confirmed_time' => '9999-12-31 00:00:00.000',
                    'bought_time' => Carbon::now(),
                    'valid_time' => '9999-12-31 00:00:00.000',
                    'taken_time' => '9999-12-31 00:00:00.000',
                    'isCancel' => 0
                ];
            }

            $Billing = GameBillingPaidItem::insert($paidItems);

            if ($Billing === false) {
                DB::rollBack();
                return redirect()->route('index')->with('error', 'Could not add paid items');
            }

            $updateUserBalance = $user->decrement('balance', $order->total_price);
            if (!$updateUserBalance) {
                DB::rollBack();
                return redirect()->route('index')->with('error', 'Could not update user balance.');
            }
            $updateOrderStatus = $order->update(['status' => 'success']);
            if (!$updateOrderStatus){
                DB::rollBack();
                return redirect()->route('index')->with('error', 'Could not update order status.');
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('An error occurred during the checkout process: ' . $e->getMessage());
            return redirect()->route('index')->with('error', 'An occurred during the checkout process.' . $e->getMessage());
        }
        return redirect()->route('index')->with('success', 'Your order was complete successfully');
    }
}

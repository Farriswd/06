<?php


namespace App\Services;


use App\Models\OrderItem;

class OrderItemProcessor
{
    public function processOrderItems($order, $mergedData) {
        $orderItems = [];

        foreach ($mergedData as $cart) {
            $orderItems[] = [
                'order_id' => $order->id,
                'product_id' => $cart['product_id'],
                'quantity' => $cart['quantity'],
                'unit_price' => $cart['price']
            ];
        }

        OrderItem::insert($orderItems);
    }
}

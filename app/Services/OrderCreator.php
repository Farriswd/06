<?php


namespace App\Services;


use App\Models\Order;

class OrderCreator
{
    public function createOrder($total, $userId) {
        return Order::create([
            'total_price' => $total,
            'status' => 'new',
            'user_id' => $userId
        ]);
    }
}

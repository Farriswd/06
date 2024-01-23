<?php


namespace App\Services;


use App\Models\GameBillingPaidItem;
use Carbon\Carbon;

class PaidItemProcessor
{
public function processPaidItem($mergedData, $order, $user) {
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
    GameBillingPaidItem::insert($paidItems);
}
}

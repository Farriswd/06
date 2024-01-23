<?php


namespace App\Services;


class UserBalanceUpdater
{
    public function updateBalance($user, $amount) {
        return $user->decrement('balance', $amount);
    }
}

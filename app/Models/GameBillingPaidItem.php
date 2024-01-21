<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameBillingPaidItem extends Model
{
    use HasFactory;
    protected $connection = 'billing_db';
    protected $table = 'PaidItem';
    protected $primaryKey = 'sid';
    protected $fillable = [
        'buy_id',
        'account_id',
        'avatar_id',
        'server_name',
        'taken_account_id',
        'taken_avatar_id',
        'taken_avatar_name',
        'taken_server_name',
        'item_code',
        'item_count',
        'type',
        'rest_item_count',
        'confirmed',
        'confirmed_time',
        'bought_time',
        'valid_time',
        'taken_time',
        'isCancel'
    ];

    public $timestamps = false;
}

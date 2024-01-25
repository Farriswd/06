<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'session_id',
        'type',
        'quantity'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTelecasterAlliance extends Model
{
    use HasFactory;
    protected $connection = 'telecaster_db';
    protected $table = 'Alliance';
    protected $fillable = [
        'name',
        'lead_guild_id',
        'max_alliance_cnt',
        'name_changed'
    ];
}

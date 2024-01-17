<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'auth_ip',
        'auth_port',
        'image',
        'game_ip',
        'game_port',
        'game_console_port',
        'db_ip',
        'db_port',
        'username',
        'password',
        'telecaster_db',
        'arcadia_db'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTelecasterCharacter extends Model
{
    use HasFactory;

    protected $connection = 'telecaster_db';
    protected $table = 'Character';
}

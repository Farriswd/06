<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTelecasterGuild extends Model
{
    use HasFactory;
    protected $connection = 'telecaster_db';
    protected $table = 'Guild';
    protected $fillable = [
        'sid',
        'name',
        'notice',
        'url',
        'icon',
        'dungeon_id',
        'alliance_id'
    ];

    public function getAllianceInfoAttribute() {
        return GameTelecasterAlliance::where('sid', $this->alliance_id)->first();
    }
}

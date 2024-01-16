<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTelecasterCharacter extends Model
{
    use HasFactory;

    protected $connection = 'telecaster_db';
    protected $table = 'Character';
    protected $fillable = [
        'sid',
        'name',
        'account',
        'account_id',
        'permission',
        'race',
        'sex',
        'lv',
        'job',
        'gold'
    ];


    public function getCharacterGuildAttribute() {
        return GameTelecasterGuildMember::where('player_id', $this->sid)->first();
    }
}

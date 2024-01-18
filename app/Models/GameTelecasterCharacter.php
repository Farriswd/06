<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTelecasterCharacter extends Model
{
    use HasFactory;

    protected $connection = 'telecaster_db';
    protected $table = 'Character';
    protected $primaryKey = 'sid';
    protected $fillable = [
        'sid',
        'name',
        'account',
        'account_id',
        'permission',
        'race',
        'sex',
        'lv',
        'exp',
        'talent_point',
        'huntaholic_point',
        'arena_point',
        'job',
        'gold'
    ];
    public $timestamps = false;

    public function getCharacterGuildAttribute() {
        return GameTelecasterGuildMember::where('player_id', $this->sid)->first();
    }
    public function getRaceNameAttribute() {
        switch ($this->attributes['race']) {
            case 3:
                return 'Gaia';
            case 4:
                return 'Deva';
            case 5:
                return 'Asura';
            default:
                return 'Unknown race';
        }
    }
    public function getSexNameAttribute() {
        switch ($this->attributes['sex']) {
            case 1:
                return 'Girl';
            case 2:
                return 'Boy';
            default:
                return 'Unknown sex';
        }
    }
}

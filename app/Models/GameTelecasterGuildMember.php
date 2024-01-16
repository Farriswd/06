<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTelecasterGuildMember extends Model
{
    use HasFactory;
    protected $connection = 'telecaster_db';
    protected $table = 'GuildMember';
    protected $fillable = [
        'player_id',
        'guild_id',
        'prev_guild_id',
        'guild_block_time',
        'permission',
        'memo'
    ];

    public function getGuildInfoAttribute() {
        return GameTelecasterGuild::where('sid', $this->guild_id)->first();
    }
}

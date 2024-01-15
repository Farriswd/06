<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameAuthAccount extends Model
{
    use HasFactory;

    protected $connection = 'auth_db';
    protected $table = 'Account';
    protected $fillable = [
        'account_id',
        'account',
        'password',
        'email',
        'password2',
        'block',
        'IP_user',
        'last_login_server_idx',
        'Admin',
        'point',
        'datePassword',
        'pk_',
        'creationDate_',
        'updateDate_',
        'creatorId_',
        'updatorId_',
        'portId_',
        'type_',
        'accessDate_'
    ];
    public $timestamps = false;
}

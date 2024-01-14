<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'header_logo',
        'main_logo',
        'footer_logo',
        'copyright_text',
        'facebook_link',
        'discord_link'
    ];
}

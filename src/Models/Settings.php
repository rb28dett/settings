<?php

namespace RB28DETT\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $table = 'rb28dett_settings';
    public $fillable = [
        'appname', 'description', 'keywords', 'author',
    ];
}

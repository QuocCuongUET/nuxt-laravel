<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialiteUser extends Model
{
    protected $fillable = [
        'provider', 'uui', 'user_id',
    ];
}

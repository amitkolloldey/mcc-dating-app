<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $fillable = [
        'user_id',
        'interested_in',
        'show_age',
        'show_bio',
        'show_publicly'
    ];

    /*
     * Defining Constant values for Interested In Column
     */
    const INTERESTED_IN = [
        'male' => 'Man',
        'female' => 'Woman'
    ];
}

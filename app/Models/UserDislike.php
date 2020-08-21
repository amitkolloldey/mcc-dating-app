<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDislike extends Model
{
    protected $table = 'user_dislikes';

    protected $fillable = [
        'user_id',
        'disliked_user_id'
    ];
}

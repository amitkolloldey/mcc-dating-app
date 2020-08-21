<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
    protected $table = 'user_likes';

    protected $fillable = [
        'user_id',
        'liked_user_id',
        'is_mutual'
    ];
}

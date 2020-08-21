<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'gender',
        'status',
        'image',
        'phone',
        'date_of_birth',
        'bio',
        'age',
        'lat',
        'lng',
        'city',
        'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /*
     * Defining Constant values for gender
     */
     const GENDER = [
         'male' => "Male",
         'female' => "Female",
         'other' => "Other",
     ];

    /**
     * @param $date_of_birth
     */
    public function setDateOfBirthAttribute($date_of_birth)
    {
        $this->attributes['date_of_birth'] = $date_of_birth;
        $this->attributes['age'] = Carbon::parse($date_of_birth)->age;
    }

    /**
     * Gets User Interests
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }

    /**
     * Gets Users Setting
     */
    public function setting()
    {
        return $this->hasMany(UserSetting::class);
    }

    /**
     * Gets User Match
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function mutualLikes()
    {
        return $this->belongsToMany(User::class, 'user_likes', 'user_id', 'liked_user_id')
            ->where('is_mutual',1);
    }

    /**
     * Scope a query to only include users within radius.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindWithinRadius($query, $lat, $lng, $radius)
    {
        return $query->selectRaw("id, name,username, image, age, city, country, ( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance", [$lat, $lng, $lat])
            ->having("distance", "<", $radius)
            ->where('id', '!=', auth()->id());
    }
}

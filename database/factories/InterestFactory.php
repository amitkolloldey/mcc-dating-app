<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Interest;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'name' => strtoupper(Str::random(rand(1,10)))
    ];
});

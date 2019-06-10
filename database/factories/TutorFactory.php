<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Tutor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'org_id' => rand(1,3), 
    ];
});

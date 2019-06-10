<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\OrganizacionExterna::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->randomElement(['Codelco','FCAB', 'Hospital_Regional']),
    ];
});

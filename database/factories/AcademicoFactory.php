<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Academico::class, function (Faker $faker) {
    
    return [
        'rut' => $faker->bothify('1#.###.###-#'),
        'nombre' => $faker->name,
        'correo' => $faker->safeEmail,
        'disponible' => $faker->randomElement(['SI']),
    ];
});

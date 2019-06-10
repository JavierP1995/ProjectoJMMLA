<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TipoActividadTitulacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->randomElement(['Capstone','Memoria', 'Tesis']),
        'cantMax' => rand(1,5),
        'duracion' => rand(1,2),
        'organizacionExterna' => $faker->randomElement(['SI','NO']),
        'disponible' => $faker->randomElement(['SI','NO']),
    ];
});

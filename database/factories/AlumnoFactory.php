<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Alumno::class, function (Faker $faker) {
    return [
        'rut' => $faker->bothify('1#.###.###-#'),
        'nombre' => $faker->name,
        'correo' => $faker->safeEmail,
        'telefono' => $faker->optional()->numerify('########'),
        'disponible' => $faker->randomElement(['SI']),
        'carrera_id' => rand(1,3),
    ];
});

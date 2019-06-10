<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\TrabajoTitulacion::class, function (Faker $faker) {
    $semestre_inscripcion = rand(1,2);
    $año_inscripcion = rand(2019,2020);
    $slash = '/';
    return [
        'nombre' => $faker->unique()->randomLetter(),
        //'inicio' => $faker->date($format = 'Y-m-d ', $max = 'now'),
        //'termino' => $faker->date($format = 'Y-m-d ', $min = 'now'),
        'semestre_año_inscripcion' => $semestre_inscripcion.$slash.$año_inscripcion,
        'estado' => $faker->randomElement(['INGRESADA','ACEPTADA']),
        //'numero_inscripcion' => $faker->optional()->numberBetween(1,1000),
        //'fecha_examen' => $faker->date($format = 'Y-m-d ', $min = 'now'),
        //'nota_obtenida' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 7),
        'tipoActividad_id' => rand(1,2),
        'tutor_id' => $faker->numberBetween(1,6),
    ];
});

<?php

use Illuminate\Database\Seeder;

class TipoActividadTitulacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\TipoActividadTitulacion::create([
            'nombre' => 'Capstone',
            'cantMax' => 4,
            'duracion' => 2,
            'organizacionExterna' => 'SI',
            'disponible' => 'SI',
        ]);
        App\TipoActividadTitulacion::create([
            'nombre' => 'Memoria',
            'cantMax' => 1,
            'duracion' => 2,
            'organizacionExterna' => 'SI',
            'disponible' => 'SI',
        ]);
        App\TipoActividadTitulacion::create([
            'nombre' => 'Tesis',
            'cantMax' => 2,
            'duracion' => 1,
            'organizacionExterna' => 'NO',
            'disponible' => 'SI',
        ]);
    }
}

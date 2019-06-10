<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*App\Carrera::create([
            'nombre' => '',
        ]);*/
        App\Carrera::create([
            'nombre' => 'Ingeniería Civil en Computación e Informática',
        ]);
        App\Carrera::create([
            'nombre' => 'Ingeniería en Computación e Informática',
        ]);
        App\Carrera::create([
            'nombre' => 'Ingeniería de Ejecución en Computación e Informática',
        ]);
    }
}

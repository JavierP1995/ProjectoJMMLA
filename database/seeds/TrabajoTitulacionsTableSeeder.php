<?php

use Illuminate\Database\Seeder;

class TrabajoTitulacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\TrabajoTitulacion::class, 10)->create()->each(function(App\TrabajoTitulacion $trabajo){
            $profesor1 = rand(1,15);
            $profesor2 = rand(16,30);
            $alumno = rand(1,50);
            $trabajo->alumnos()->attach([
                $alumno
            ]);
            $trabajo->guias()->attach([
                $profesor1,
                $profesor2,
            ]);
            $trabajo->correctores()->attach([
                $profesor1,
                $profesor2,
            ]);

        });

    }
}

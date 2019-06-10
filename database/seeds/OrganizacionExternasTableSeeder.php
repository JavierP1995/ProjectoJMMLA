<?php

use Illuminate\Database\Seeder;

class OrganizacionExternasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\OrganizacionExterna::create([
            'nombre' => 'FCAB',
        ]);
        App\OrganizacionExterna::create([
            'nombre' => 'Aguas Antofagasta',
        ]);
        App\OrganizacionExterna::create([
            'nombre' => 'Codelco',
        ]);
    }
}

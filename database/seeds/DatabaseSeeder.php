<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganizacionExternasTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
        $this->call(TipoActividadTitulacionsTableSeeder::class);
        $this->call(AlumnosTableSeeder::class);
        $this->call(AcademicosTableSeeder::class);
        $this->call(TutorsTableSeeder::class);
        $this->call(TrabajoTitulacionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

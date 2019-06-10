<?php

use Illuminate\Database\Seeder;

class AcademicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Academico::class, 30)->create();
    }
}

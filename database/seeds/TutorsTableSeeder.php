<?php

use Illuminate\Database\Seeder;

class TutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tutor::create([
            'nombre' => 'Angela Bosques',
            'org_id' => 3,
        ]);
        App\Tutor::create([
            'nombre' => 'Fernando León',
            'org_id' => 2,
        ]);
        App\Tutor::create([
            'nombre' => 'Loreto Saramago',
            'org_id' => 2,
        ]);
        App\Tutor::create([
            'nombre' => 'Rayén Lafquen',
            'org_id' => 1,
        ]);
        App\Tutor::create([
            'nombre' => 'Erick Dostoivesky',
            'org_id' => 1,
        ]);
        App\Tutor::create([
            'nombre' => 'Carlos Bodoque',
            'org_id' => 3,
        ]);
    }
}

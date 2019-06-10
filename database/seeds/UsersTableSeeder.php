<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 29)->create();

        App\User::create([
            'name' => 'admin',
            'type' => 3,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('asdasd123')
        ]);
        App\User::create([
            'name' => 'Encargado de Titulacion',
            'type' => 3,
            'email' => 'encargado_titulacion@ucn.cl',
            'password' => bcrypt('123')
        ]);
        App\User::create([
            'name' => 'Secretaria',
            'type' => 2,
            'email' => 'secretaria@ucn.cl',
            'password' => bcrypt('123')
        ]);
        App\User::create([
            'name' => 'Academico',
            'type' => 1,
            'email' => 'academico@ucn.cl',
            'password' => bcrypt('123')
        ]);
        
    }
}

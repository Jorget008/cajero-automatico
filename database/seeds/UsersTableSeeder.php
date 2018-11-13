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
        //
        DB::table('usuarios')->insert([
            'nombre' => 'Jorge Luis Tinjacá Burgos',
            'usuario' => 'jorge',
            'contrasenia' => bcrypt('secret'),
        ]);
        DB::table('usuarios')->insert([
            'nombre' => 'Edwin Steven Rodríguez Suárez',
            'usuario' => 'edwin',
            'contrasenia' => bcrypt('secret'),
        ]);
    }
}

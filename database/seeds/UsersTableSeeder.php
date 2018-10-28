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
            'nombre' => 'Jorge Luis',
            'usuario' => 'jorge',
            'contrasenia' => bcrypt('secret'),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class TransaccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transacciones')->insert([

            'nombre' =>"Egreso",

        ]);
        DB::table('transacciones')->insert([

            'nombre' =>"Ingreso",

        ]);
    }
}

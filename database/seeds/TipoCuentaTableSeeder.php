<?php

use Illuminate\Database\Seeder;

class TipoCuentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_cuentas')->insert([

            'nombre' =>"Cuenta de ahorros",

        ]);
        DB::table('tipo_cuentas')->insert([

            'nombre' =>"Cuenta corriente",

        ]);


    }
}

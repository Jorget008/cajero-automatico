<?php

use Illuminate\Database\Seeder;

class CuentaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cuentas')->insert([
            'tipo_cuenta_id' =>"1",
            'usuario_id' =>"1",
            'saldo' =>"1000000",
        ]);
        DB::table('cuentas')->insert([
            'tipo_cuenta_id' =>"2",
            'usuario_id' =>"1",
            'saldo' =>"1000000",
        ]);
        DB::table('cuentas')->insert([
            'tipo_cuenta_id' =>"1",
            'usuario_id' =>"2",
            'saldo' =>"1000000",

        ]);
        DB::table('cuentas')->insert([
            'tipo_cuenta_id' =>"2",
            'usuario_id' =>"2",
            'saldo' =>"1000000",

        ]);
    }
}

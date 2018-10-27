<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MiController extends Controller
{
    //
    public function mifuncion(){
        //DB::connection()->getPdo();
        try{
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                $mensaje='Conección establecida correctamente';
            }
        }catch (\Exception $e){
            $mensaje='Se presentó un error al conectar a la base de datos o al servidor';
        }



        //$mivariable='Hola mundo, saludo desde el controlador';
        return view('mivista',['mivariable'=>$mensaje]);
    }

    public function micajero(){
        return view('login');
    }
}

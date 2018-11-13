<?php

namespace App\Http\Controllers;

use App\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimientoController extends Controller
{
    //
    public function estracto(){
        $usuario=Auth::user();
        $estractos=Movimiento::where("usuario_id",$usuario->id)->with('Cuenta','Transaccion','Cuenta.TipoCuenta')->get();
        $mensaje=[];
        foreach ($estractos as $estracto){
            $mensaje[]=[
                $estracto->updated_at,
                $estracto->descripcion,
                $estracto->valor,
            ];
        }


        return response(
            [
                "title"=>"Sus movimientos",
                "mensaje"=>[$usuario,$estractos],
                "type"=>"success"]);
    }
}

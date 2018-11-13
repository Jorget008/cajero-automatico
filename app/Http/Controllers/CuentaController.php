<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Movimiento;
use App\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;

class CuentaController extends Controller
{
    //
    public function index(){
        return view('cajero.index');
    }

    public function misaldo($tipocuenta){
        $usuario=Auth::user()->id;

        $misaldo=Cuenta::with("TipoCuenta")->where('usuario_id',$usuario)
            ->where('tipo_cuenta_id',$tipocuenta)->first();

        if(isset($misaldo->saldo)){
            return response(["title"=>$misaldo->TipoCuenta->nombre,"mensaje"=>"Dinero disponible: ".$misaldo->saldo,"type"=>"success"]);
        }
        else{
            return response(["title"=>"Sin resultados.","mensaje"=>"Usted no posee este tipo de cuenta.","type"=>"error"]);
        }
    }

    public function miretiro(Request $request){
        $usuario=Auth::user()->id;
        $movimiento=$request->tipomovimiento;

        $misaldo=Cuenta::where('usuario_id',$usuario)
            ->where('tipo_cuenta_id',$request->tipocuenta)->first();

        if($movimiento==0){
            if(isset($misaldo->saldo)){
                if($misaldo->saldo>=$request->valor ){
                    $misaldo->saldo=$misaldo->saldo-$request->valor;
                    $misaldo->save();

                    $transaccion=new Movimiento();
                    $transaccion->transaccion_id="1";
                    $transaccion->usuario_id=$usuario;
                    $transaccion->cuenta_id=$misaldo->id;
                    $transaccion->valor=$request->valor;
                    $transaccion->save();
                    return response(["title"=>"Retire su dinero","mensaje"=>"Se ha retirado ".$request->valor. "peso(s). Saldo disponible: ".$misaldo->saldo,"type"=>"success"],200);
                }
                else{
                    return response(["title"=>"Fondos insuficientes.","mensaje"=>"No cuenta con fondos suficientes en esta cuenta.","type"=>"error"],200);
                }
            }
            else{
               return response(["title"=>"Sin resultados.","mensaje"=>"Usted no posee este tipo de cuenta.","type"=>"error"],200);
            }
        }
        else{
            if(isset($misaldo->saldo)){
            $misaldo->saldo=$misaldo->saldo+$request->valor;
            $misaldo->save();

                $transaccion=new Movimiento();
                $transaccion->transaccion_id="2";
                $transaccion->usuario_id=$usuario;
                $transaccion->cuenta_id=$misaldo->id;
                $transaccion->valor=$request->valor;
                $transaccion->save();
            return response(["title"=>"Consignación realizada.","mensaje"=>"Se ha consignado ".$request->valor. "peso(s) a su ".$misaldo->TipoCuenta->nombre,"type"=>"success"],200);
        }else{
                return response(["title"=>"Sin resultados.","mensaje"=>"Usted no posee este tipo de cuenta.","type"=>"error"],200);
            }
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuentaController extends Controller
{
    //
    public function index(){
        return view('cajero.index');
    }

    public function misaldo($tipocuenta){
        $usuario=Auth::user()->id;

        $misaldo=Cuenta::with("TipoCuenta")->where('usuario_id',$usuario)
            ->where('tipo_cuenta_id',$tipocuenta)->first()
        ;

        if(isset($misaldo->saldo)){
            return response(["saldo"=>$misaldo->saldo,"tipocuenta"=>$misaldo->TipoCuenta->nombre,"status"=>true]);
        }
        else{
            return response(["saldo"=>0,"tipocuenta"=>'ninguna',"status"=>false]);
        }

    }
    //public function miretiro($tipocuenta,$tipomovimiento){
    public function miretiro(Request $request){
        //return response($request);
        $usuario=Auth::user()->id;
        $movimiento=$request->tipomovimiento;

        $misaldo=Cuenta::where('usuario_id',$usuario)
            ->where('tipo_cuenta_id',$request->tipocuenta)->first()
        ;

        if($movimiento==0){
            if(isset($misaldo->saldo)){
                if($misaldo->saldo>=$request->valor ){
                    $misaldo->saldo=$misaldo->saldo-$request->valor;
                    $misaldo->save();
                    return response(["saldo"=>$misaldo->saldo,"mensaje"=>'Retiro realizado correctamente',"status"=>true]);
                }
                else{
                    return response(["saldo"=>$misaldo->saldo,"mensaje"=>'No cuenta con fondos suficientes en esta cuenta',"status"=>false]);
                }


            }
            else{
                return response(["saldo"=>0,"mensaje"=>'Usted no cuenta con el tipo de cuenta seleccionado.',"status"=>false]);
            }

        }
        else{
            $misaldo->saldo=$misaldo->saldo+$request->valor;
            $misaldo->save();
        }


    }
    public function plantilla(){
        return view('plan');
    }
}

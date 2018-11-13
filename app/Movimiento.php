<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    //
    public function Cuenta(){
        return $this->belongsTo("App\Cuenta");
    }
    public function Transaccion(){
        return $this->belongsTo("App\Transaccion");
    }
}

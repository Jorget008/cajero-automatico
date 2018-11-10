<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //
    public function TipoCuenta(){
        return $this->belongsTo("App\Tipo_cuenta");
    }
}

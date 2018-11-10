<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    public function getAuthPassword(){
        return $this->contrasenia;
    }
    public function Cuenta(){
        $this->belongsTo("App\Cuenta");
    }
}

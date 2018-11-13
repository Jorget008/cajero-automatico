<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nombre' => 'required|string|max:255|unique:usuarios',
            'usuario' => 'required|string|min:5|max:255|unique:usuarios',
            'password' => 'required|string|min:5|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
          //  'nombre.string' => 'El nombre de usuario es obligatorio',
            'nombre.max' => 'El nombre no debe ser mayor a 255 caracteres',
            'nombre.unique' => 'Este nombre ya ha sido utilizado.',
            //'email.email'  => 'El correo electrónico debe ser una dirección de correo electrónico válida',
            'usuario.max'  => 'El usuario no debe superar los 255 caracteres',
            'usuario.required'  => 'El usuario es obligatorio.',
            'usuario.unique'  => 'El usuario ya existe en la base de datos.',

            'password.required'  => 'La contraseña es obligatoria',
            'password.min'  => 'La contraseña debe tener mínimo 5 caracteres',
            'password.confirmed'  => 'Las contraseñas no coinciden',
        ];
    }
}

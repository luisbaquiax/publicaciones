<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUsuario extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombre" => "required | min:1 | max:45 | string",
            "apellido" => "required | min:1 | max:45 | string",
            "correo" => "required | min:1 | max:45 | string | email",
            "telefono"=>"required | min:1 | max:45 | integer | min:1 | max:45",
            "username" => "required | min:1 | max:45 | string",
            "password" => "required",
            "password_confirmation" => "required",
        ];
    }
}

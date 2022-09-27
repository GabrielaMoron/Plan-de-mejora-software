<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => 'Nombre obligatorio',
            "name.min" => 'caracteres minimos: 3',
        ];
    }

    // Enviar response con errores de validacion
    protected function failedValidation(Validator $v){
        // Si la validacion es fallida se lanza una exepcion Http
        throw new HttpResponseException(
            response()->json([
                        "success" => false,
                        "erros" => $v->errors()
            ] , 422)
            );
    }
}
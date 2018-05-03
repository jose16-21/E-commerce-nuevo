<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaPersona extends FormRequest
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
            'nombres'=>'required', 
            'apellidos'=>'required', 
            'email' => 'required|string|email|max:255|unique:persona',
            'edad'=>'required|integer|integer|max:99|',
            'estado'=>'in:C,S|required',
            'genero'=>'in:M,F|required'
        ];
    }
}

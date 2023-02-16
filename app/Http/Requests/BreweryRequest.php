<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreweryRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|min:10',
            'score' => 'required|integer|between:1,5'
        ];
    }

    public function messages(){

    return [
    'name.required' => 'Es necesario que indiques un nombre para la Cerveceria',
    'description' => [
        'required' => 'Es necesario que indiques una descripcion para la Cerveceria.',
        'min' => 'La descripcion requiere al menos 10 posiciones.'

    ],
    'score' => [
        'required' => 'Es necesario que indiques una puntuación a la Cerveceria',
        'between' => 'El numero min es 1 y el max es 5'
    ]
    ];
    }

}

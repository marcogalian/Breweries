<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeerRequest extends FormRequest
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
            'image',
            'beertype_id' => 'required',
            'vol' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/|between:0,15.00'
        ];
    }
}

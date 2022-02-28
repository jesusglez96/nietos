<?php

namespace App\Http\Requests;

use App\Http\Request\Date;
use Illuminate\Foundation\Http\FormRequest;

class validacionCiudad extends FormRequest
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
            'city_origin' => 'required',
            'city_destiny' => 'required|different:city_origin',
            'country_origin' => 'required',
            'country_destiny' => 'required',
            'date' => 'required|date|after:tomorrow',
            'seat_total' => 'required',
            'seat_available' => 'required|between:0,seat_total',
            'price' => 'required|numeric|min:0',
        ];
    }
}

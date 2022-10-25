<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
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
            'date' => 'required|date',
 
            'prif' => 'required|prif',
            'city' => 'required|city',
            'adress' => 'required|adress',
            'station' => 'required|station',
            'access' => 'required|access',
            'tel' => 'required|tel',
            'holiday' => 'required|holiday',
            'start_time' => 'required|start_time',
            'end_time' => 'required|end_time',
            'price' => 'required|price',
            'lat' => 'required|lat',
            'lng' => 'required|lng',

        ];
    }
}

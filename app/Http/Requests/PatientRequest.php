<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
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

            'name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'id_card' => ['required', 'max:100'],
            'type_card' => ['required', 'exists:tenant.card_types,id'],
            //'photo' => ['required'],
            'date-birth' => ['required'],
            'place-birth' => ['required', 'max:100'],
            'age' => ['required', 'max:3'],
            'occupation' => ['required', 'max:100'],
            'marital-status' => ['required', Rule::in(['significant other', 'married', 'single', 'divorced'])],
            'status' => ['required', 'boolean'],

            'email' => ['required', 'email', "unique:tenant.patients,email,{$this->patient->id}"],
            'cellphone' => ['required', 'max:15'],
            'phone' => ['required', 'max:15'],
            //'country' => ['required', 'max:100'],
            'city' => ['required', 'max:100'],
            'address' => ['required', 'max:200'],
            'neighborhood' => ['required', 'max:200'],

            'medical-entity' => ['required', 'max:100'],
            'contributory-regime' => ['required', 'max:100'],
            'status-medical' => ['required', 'boolean'],
        ];
    }
}

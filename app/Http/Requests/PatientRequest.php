<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => ['required', 'email', 'unique:tenant.patients,email'],
            'cellphone' => ['required', 'max:15'],
            'phone' => ['required', 'max:15'],
            'id_card' => ['required', 'max:100'],
            'type_card' => ['required', 'exists:tenant.card_types,id'],
            'medical_security' => ['required'],
            //'status' => ['required', 'boolean'],
            //'photo' => [],
        ];
    }
}

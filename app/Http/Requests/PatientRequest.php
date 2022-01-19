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

            'name_first' => ['required', 'max:100'],
            'name_second' => ['max:100'],
            'lastname_first' => ['required', 'max:100'],
            'lastname_second' => ['max:100'],
            'id_card' => ['required', 'max:100'],
            'type_card' => ['required', 'exists:tenant.card_types,id'],
            //'photo' => ['required'],
            'date-birth' => ['required'],
            //'place-birth' => ['required', 'max:100'],
            'country_birth' => ['required', 'max:100'],
            'code_country_birth' => ['required', 'max:20'],
            'department_birth' => ['required', 'max:100'],
            'code_department_birth' => ['required', 'max:20'],
            'city_birth' => ['required', 'max:100'],
            'code_city_birth' => ['required', 'max:20'],
            'blood_group' => ['required'],
            'occupation' => ['required', 'max:100'],
            'code_occupation' => ['required', 'max:20'],
            'marital-status' => ['required', Rule::in([
                'married',
                'single',
                'divorced',
                'union couples',
                'widower',
                'legal separation',
                'Concubinage',
                'significant other'
            ])],
            'gender' => ['required', Rule::in(['male', 'feminine', 'intersex'])],
            'gender_identity' => ['required', Rule::in([
                'male',
                'feminine',
                'transgender',
                'neutral',
                'not declare'
            ])],
            'status' => ['required', 'boolean'],

            'email'         => ['required', 'email', "unique:tenant.patients,email" . ((isset($this->patient->id)) ? ',' . $this->patient->id : '')],
            'cellphone'     => ['required', 'max:15'],
            'phone'         => ['required', 'max:15'],
            'country'       => ['required', 'min:3', 'max:100'],
            'code_country'  => ['required', 'max:20'],
            'department'    => ['required', 'min:3', 'max:100'],
            'code_department'=> ['required', 'max:20'],
            'city'          => ['required', 'min:3', 'max:100'],
            'code_city'     => ['required', 'max:20'],
            'address'       => ['required', 'max:200'],
            'neighborhood'  => ['required', 'max:200'],
            'locality'      => ['required', 'max:100'],
            'postcode'      => ['required', 'max:100'],
            'stratum'       => ['required', 'max:50'],
            'uptown'        => ['required', Rule::in(['urban', 'rural'])],

            'medical-entity'        => ['required', 'max:100'],
            'contributory-regime'   => ['required', 'max:100'],
            'status-medical'
            => ['required'
                , 'boolean'
            ],

            'opposition_organ_donation' =>
                ['required'
                    , 'date'],
            'advance_directive'     => ['required', 'date'],
            'code_advance_directive' => ['required', 'max:100'],
            'impairment'            => ['required', Rule::in([
                'physical disability',
                'visual impairment',
                'hearing impairment',
                'intellectual disability',
                'psychosocial disability',
                'deaf blind',
                'multiple disability',
                'no disability'
            ])],
            'ethnicity'         => ['required', 'max:100'],
            'ethnic_community'  => ['required', 'max:100'],
        ];
    }
}

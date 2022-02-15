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
            'name_first'        => ['required', 'max:100'],
            'name_second'       => ['nullable', 'max:100'],
            'lastname_first'    => ['required', 'max:100'],
            'lastname_second'   => ['nullable', 'max:100'],
            'id_card'           => ['required', 'max:100'],
            'card_type_id'      => ['required', 'exists:system.card_types,id'],
            'gender'            => ['required', Rule::in(['male', 'feminine', 'intersex'])],
            'gender_identity'   => ['required', Rule::in(['male', 'feminine', 'transgender', 'neutral', 'not declare'])],
            'marital_status'    => ['required', Rule::in(['married', 'single', 'divorced', 'union couples', 'widower', 'legal separation', 'Concubinage', 'significant other'])],
            'occupation'        => ['nullable', 'max:100'],
            //'code_occupation'   => ['required', 'max:10'],
            //'schooling_level_id'=> ['required', 'exists:system.schooling_levels,id'],
            'ethnicity'         => ['required', Rule::in(['indigenous', 'gypsy', 'raiza', 'black person', 'Afrocolombiano', 'none',])],
            'ethnic_community'  => ['nullable', 'max:100'],
            'stratum'           => ['required', 'max:5'],
            'birthday'          => ['required', /*'date_format:Y-m-d H:i'*/ 'date'],
            'country_birth'     => ['required', 'max:100'],
            'code_country_birth'=> ['required', 'max:20'],
            'department_birth'  => ['required', 'max:100'],
            'code_department_birth' => ['required', 'max:20'],
            'city_birth'        => ['required', 'max:100'],
            'code_city_birth'   => ['required', 'max:20'],

            'photo'             => ['nullable', 'image'],
            'email'             => ['required', 'email', "unique:tenant.patients,email" . ((isset($this->patient->id)) ? ',' . $this->patient->id : '')],
            'cellphone'         => ['required', 'max:15'],
            'phone'             => ['required', 'max:15'],
            'country'           => ['required', 'min:3', 'max:100'],
            'code_country'      => ['required', 'max:20'],
            'department'        => ['required', 'min:3', 'max:100'],
            'code_department'   => ['required', 'max:20'],
            'city'              => ['required', 'min:3', 'max:100'],
            'code_city'         => ['required', 'max:20'],
            'address'           => ['required', 'max:200'],
            'neighborhood'      => ['required', 'max:200'],
            'locality'          => ['required', 'max:100'],
            'postcode'          => ['required', 'max:100'],
            'uptown'            => ['required', Rule::in(['urban', 'rural'])],

            'entity'                => ['required', 'max:100'],
            'code_entity'           => ['required', 'max:100'],
            'contributory_regime'   => ['required', 'max:100'],
            //'status_medical'        => ['required' , 'boolean'],

            'blood_group'               => ['required', Rule::in(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'])],
            'opposition_organ_donation' => ['nullable', 'date'],
            'advance_directive'         => ['nullable', 'date'],
            'code_advance_directive'    => ['nullable', 'max:100'],
            'impairment'                => ['required', Rule::in(['physical disability', 'visual impairment', 'hearing impairment', 'intellectual disability', 'psychosocial disability', 'deaf blind', 'multiple disability', 'no disability'])],
            'observation'               => ['nullable'],
            'accept_terms_conditions'   => (!isset($this->patient->id)) ? ['required', 'accepted']:[],
            'accept_sending_communications' => (!isset($this->patient->id)) ? ['nullable', 'boolean']:[],
        ];
    }
}

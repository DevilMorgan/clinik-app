<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name'      => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'id_card'   => ['required', 'max:100'],
            'type_card' => ['required', 'exists:tenant.card_types,id'],
            'email'     => ['required', 'email', "unique:tenant.patients,email" . ((isset($this->user->id)) ? ',' . $this->user->id : '')],
            'cellphone' => ['required', 'max:15'],

            //'photo'     => ['image'],
            'phone'     => ['max:15'],
            'code-profession'   => ['max:100'],
            'profession'        => ['max:100'],
            //'digital-signature' => ['max:100'],
            'surgery'           => ['exists:tenant.surgeries,id'],

            'status' => ['required', 'boolean'],
            'password' => ['confirmed', Password::min(8)]
            //'password' => ['confirmed', Password::min(8)->mixedCase()->symbols()]
        ];
    }
}

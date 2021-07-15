<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
        $rules = [];

//        $rules['avatar'] = [
//            'required',
//            'image',
//            'mimes:jpeg,png,jpg',
//            Rule::dimensions()->minWidth(500)->minHeight(500)->maxWidth(500)->maxHeight(500)->ratio(1 / 1),
//            'max:2048',
//        ];

        $rules['first_name'] = [
            'required',
            'max:255',
        ];

        $rules['last_name'] = [
            'required',
            'max:255',
        ];

//        $rules['type'] = [
//            'required',
//            Rule::in(['Scout', 'Club', 'Agency']),
//        ];

        $rules['country'] = [
            'required',
            'max:255',
        ];

//        $rules['dob'] = [
//            'required',
//            'date_format:"F d, Y"',
//        ];
//
//        $rules['gender'] = [
//            'required',
//            Rule::in(['Male', 'Female']),
//        ];

        $rules['email'] = [
            'required',
            'max:255',
            function($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $fail('Invalid ' . $attribute . ' format found.');
                }
            },
            'unique:users,email',

        ];

//        $rules['phone'] = [
//            'required',
//            'max:255',
//        ];

//        $rules['password'] = [
//            'required',
//            'string',
//            'min:6',
//            'max:20',
//            'confirmed'
//        ];

//        $rules['password_confirmation'] = [
//            'required',
//            'string',
//            'min:6',
//            'max:20',
//        ];

        return $rules;
    }
}

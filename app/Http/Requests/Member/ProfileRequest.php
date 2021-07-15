<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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

        $rules['first_name'] = [
            'required',
            'max:255',
        ];

        $rules['last_name'] = [
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
//
        $rules['country'] = [
            'required',
            'max:255',
        ];
//
//        $rules['city'] = [
//            'required',
//            'max:255',
//        ];
//
        $rules['phone'] = [
            'required',
            'max:255',
        ];
//
//        $rules['spoken_language'] = [
//            'required',
//            'max:255',
//        ];

        $rules['club_name'] = [
            'required',
            'max:255',
        ];

//        $rules['club_contact_name'] = [
//            'required',
//            'max:255',
//        ];
//
//        $rules['club_phone'] = [
//            'required',
//            'max:255',
//        ];
//
//        $rules['club_email'] = [
//            'required',
//            'max:255',
//            function($attribute, $value, $fail) {
//                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
//                    $fail('Invalid ' . $attribute . ' format found.');
//                }
//            },
//        ];
//
//        $rules['strong_leg'] = [
//            'required',
//            'max:255',
//        ];
//
//        $rules['position'] = [
//            'required',
//            'max:255',
//        ];
//
//        $rules['height'] = [
//            'required',
//            'numeric',
//        ];
//
//        $rules['weight'] = [
//            'required',
//            'numeric',
//        ];
//
//        $rules['passport_country'] = [
//            'required',
//            'max:255',
//        ];
//
//        $rules['passport_url'] = [
//            'required',
//        ];
//
//        $rules['passport_url.*'] = [
//            'mimes:jpeg,jpg,png,gif',
//            'max:2048'
//        ];
//
//        $rules['national_experience'] = [
//            'required',
//            'max:10000',
//        ];

        return $rules;
    }
}

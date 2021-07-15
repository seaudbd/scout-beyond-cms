<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlayerRequest extends FormRequest
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

        $rules['id'] = [
            'nullable',
            'numeric'
        ];

        $rules['email'] = [
            'nullable',
            'email',
            'max:255',
        ];

        $rules['first_name'] = [
            'nullable',
            'max:255',
        ];

        $rules['last_name'] = [
            'nullable',
            'max:255',
        ];

        $rules['dob'] = [
            'nullable',
            'date_format:"F d, Y"',
        ];

        $rules['gender'] = [
            'nullable',
            Rule::in(['Male', 'Female']),
        ];

        $rules['country'] = [
            'nullable',
            'max:255',
        ];

        $rules['city'] = [
            'nullable',
            'max:255',
        ];

        $rules['phone'] = [
            'nullable',
            'max:255',
        ];

        $rules['spoken_language'] = [
            'nullable',
            'max:255',
        ];

        $rules['club_name'] = [
            'nullable',
            'max:255',
        ];

        $rules['club_contact_name'] = [
            'nullable',
            'max:255',
        ];

        $rules['club_phone'] = [
            'nullable',
            'max:255',
        ];

        $rules['club_email'] = [
            'nullable',
            'email',
            'max:255',
        ];

        $rules['strong_leg'] = [
            'nullable',
            'max:255',
        ];

        $rules['position'] = [
            'nullable',
            'max:255',
        ];

        $rules['height'] = [
            'nullable',
            'numeric',
        ];

        $rules['weight'] = [
            'nullable',
            'numeric',

        ];

        $rules['passport_country'] = [
            'nullable',
            'max:255',
        ];

        $rules['avatar'] = [
            'nullable',
            'image',
            'mimes:jpeg,png,jpg,gif,svg',
            'max:4096',
        ];

        $rules['passport_url'] = [
            'nullable',
            'image',
            'mimes:jpeg,png,jpg,gif,svg',
            'max:4096',
        ];

        $rules['national_experience'] = [
            'nullable',
            'max:255',
        ];

        $rules['user_story'] = [
            'nullable',
            'max:10000',
        ];

        $rules['team_id'] = [
            'nullable',
            'numeric',
        ];

        $rules['status'] = [
            'nullable',
            Rule::in(['Active', 'Inactive'])
        ];



        return $rules;
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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

        $rules['name'] = [
            'required',
            'max:255'
        ];

        $rules['manager'] = [
            'required',
            'max:255'
        ];


        $rules['logo'] = [
            'required_if:id,null',
            'image',
            'mimes:jpeg,png,jpg',
            'max:2048',
        ];



        $rules['status'] = [
            'required',
            Rule::in(['Active', 'Inactive'])
        ];

        $rules['description'] = [
            'required',
            'max:10000'
        ];


        return $rules;
    }
}

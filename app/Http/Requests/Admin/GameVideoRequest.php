<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameVideoRequest extends FormRequest
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

        $rules['title'] = [
            'required',
            'max:255'
        ];

        $rules['team_id1'] = [
            'required',
            'numeric'
        ];

        $rules['team_id2'] = [
            'required',
            'numeric'
        ];

        $rules['top_player_id'] = [
            'nullable',
            'numeric'
        ];

        $rules['man_of_the_match_id'] = [
            'nullable',
            'numeric'
        ];

        $rules['team1_formation_name'] = [
            'required',
            'max:255'
        ];

        $rules['team2_formation_name'] = [
            'required',
            'max:255'
        ];

        $rules['team1_formation_url'] = [
            'required_if:id,null',
            'image',
            'mimes:jpeg,png,jpg',
            'max:4096',
        ];

        $rules['team2_formation_url'] = [
            'required_if:id,null',
            'image',
            'mimes:jpeg,png,jpg',
            'max:4096',
        ];

        $rules['video_thumbnail_url'] = [
            'required_if:id,null',
            'mimes:mp4',
            'max:102400',
        ];

        $rules['video_url'] = [
            'required_if:id,null',
            'mimes:mp4',
            'max:204800',
        ];

        $rules['report_url'] = [
            'required_if:id,null',
            'mimes:pdf',
            'max:20480',
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

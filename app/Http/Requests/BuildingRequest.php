<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'price' => 'required|numeric',
            'rooms' => 'required|integer',
            'rent' =>'required|in:1,0',
            'area' => 'required|max:10',
            'type'=> 'required|in:2,1,0',
            'short_description' => 'required|min:5|max:160',
            'meta' => 'required|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'full_description' => 'required|min:5',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTag extends FormRequest
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
            'name' => 'required|string|min:3|max:255|unique:tags',
            'slug' => 'nullable|string|min:3|unique:tags',
            'description' => 'nullable|string|min:20'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Please Enter Tag Name',
            'name.min' => 'Tag Name must be more than :min characters',
            'name.unique' => 'Tag already exists',
            'slug.min' => 'Tag Slug must be more than :min characters',
            'slug.unique' => 'Tag Slug already exists',
            'description.min' => 'Tag Description must be more than :min characters'      
        ];
    }
}
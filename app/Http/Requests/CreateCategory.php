<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategory extends FormRequest
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
            'name' => 'required|string|min:3|max:255|unique:categories',
            'slug' => 'nullable|string|min:3|unique:categories',
            'description' => 'nullable|string|min:20'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Please Enter Category Name',
            'name.min' => 'Category Name must be more than :min characters',
            'name.unique' => 'Category already exists',
            'slug.min' => 'Category Slug must be more than :min characters',
            'slug.unique' => 'Category Slug already exists',
            'description.min' => 'Category Description must be more than :min characters'
        ];
    }
}
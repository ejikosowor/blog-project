<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'title' => 'required|string|min:10|max:255',
            'slug' => 'nullable|string|min:10',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
            'excerpt' => 'required|min:50',
            'body' => 'required|min:50',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Please Enter Title',
            'title.min' => 'Post Title must be more than :min characters',
            'slug.min' => 'Post Slug must be more than :min characters',
            'category_id.required' => 'A Post must belong to a category',
            'status_id.required' => 'A Post must have a status',
            'excerpt.required' => 'Post must have an excerpt',
            'excerpt.min' => 'Post excerpt must be more than :min characters',
            'body.required' => 'Post must have a body',
            'body.min' => 'Post body must be more than :min characters'
        ];
    }
}

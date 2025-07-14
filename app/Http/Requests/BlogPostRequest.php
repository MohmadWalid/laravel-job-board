<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => "bail|required|max:255|unique:posts,title,{$this->input('id')}",
            'body' => 'required|max:510',
            'author' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Required',
            'body.required' => 'Required',
            'author.required' => 'Required'
        ];
    }
}

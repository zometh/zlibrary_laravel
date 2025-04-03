<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|min:4|unique:books,title,' . ($this->route('book') ? $this->route('book')->id : 'NULL'),
            'author'=> 'required|min:4',
            'price' => 'required|numeric',
            'stock' => 'numeric|required',
            'description' => 'required|min:5',
            'category_id' => 'required'
        ];
    }
}

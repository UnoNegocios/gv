<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => '',
            'status' => '',
            'content' => '',
            'featured_media_path' => '',
            'categories' => '',
            'tags' => '',
            'author_id' => '',
            'categories' => '',
            'tags' => '',
            'visibility' => '',
            'short_description' => ''
        ];
    }
}

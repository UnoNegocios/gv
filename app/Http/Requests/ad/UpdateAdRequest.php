<?php

namespace App\Http\Requests\ad;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdRequest extends FormRequest
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
            'alt' => '',
            'url' => '',
            'image_url' => '',
            'image_path' => '',
            'views' => '',
            'impressions' => '',
            'clicks' => '',
            'is_active' => '',
            'start_time' => '',
            'end_time' => '',
            'height' => '',
            'width' => '',
        ];
    }
}

<?php

namespace App\Http\Requests\ad_campaign;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdCampaignRequest extends FormRequest
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
            'name'=> '',
            'client_id'=> '',
            'start_time'=> '',
            'end_time'=> '',
            'views'=> '',
            'clicks'=> '',
            'is_active'=> ''
        ];
    }
}

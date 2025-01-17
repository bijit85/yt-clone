<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // allow everyone to edit every channel (temp)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ['required', 'min:4'],
            'slug' => ['required', 'min:4', 'unique:channels,slug,'.$this->channel->id],
            'public' => ['nullable', 'boolean',],
            'description' => ['nullable', 'max:4096'],
        ];
    }
}

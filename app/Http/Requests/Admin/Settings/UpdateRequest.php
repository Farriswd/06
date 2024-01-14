<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'header_logo' => 'nullable|file',
            'main_logo' => 'nullable|file',
            'footer_logo' => 'nullable|file',
            'copyright_text' => 'required|string',
            'facebook_link' => 'nullable|string',
            'discord_link' => 'nullable|string'
        ];
    }
}

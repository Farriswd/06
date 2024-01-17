<?php

namespace App\Http\Requests\Admin\GameCharacter;

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
            'name' => 'required|string',
            'permission' => 'required|integer',
            'race' => 'required|integer',
            'sex' => 'required|integer',
            'lv' => 'required|integer',
            'exp' => 'required|string',
            'talent_point' => 'required|integer',
            'huntaholic_point' => 'required|integer',
            'arena_point' => 'required|integer',
            'job' => 'required|integer',
            'gold' => 'required|integer'
        ];
    }
}

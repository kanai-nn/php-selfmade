<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirstRegistRequest extends FormRequest
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
            'start_date' => 'required',
            'm_cycle' => 'required|numeric',
            'beauty_items.*.name' => 'required',
            'beauty_items.*.cycle' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => '必須入力です。',
            'beauty_items.*.name.required' => '必須入力です。',
            'm_cycle.numeric' => '半角数字で入力してください。',
            'beauty_items.*.cycle.numeric' => '半角数字で入力してください。',
            'm_cycle.required' => '必須入力です。',
            // 'beauty_items.*.cycle.required' => '必須入力です。',
            'beauty_items.*.cycle.required' => '半角数字で入力してください。',
        ];

    }
}

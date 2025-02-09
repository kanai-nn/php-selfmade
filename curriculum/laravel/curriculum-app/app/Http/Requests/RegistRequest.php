<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
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
            'user_id' => 'required|unique:members',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'age' => 'required|',
            'area' => 'required',
        ];

        
    }


    public function messages()
    {
        return [
            'user_id.unique' => 'このIDは既に存在します。',
            'user_id.required' => '必須入力です。',
            'password.required' => '必須入力です。',
            'password.confirmed'=>'パスワードが一致しません。',
            'password_confirmation.required' => '必須入力です。',
            'age.required' => '必須入力です。',
            'area.required' => '必須入力です。',
        ];

    }
}

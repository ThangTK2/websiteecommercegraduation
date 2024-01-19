<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => '* Bạn chưa nhập email.',
            'email.email' => '* Email phải đúng định dạng.',
            'email.max' => '* Độ dài email tối đa là 255 ký tự.',
            'password.required' => '* Bạn chưa nhập mật khẩu.'
        ];
    }
}

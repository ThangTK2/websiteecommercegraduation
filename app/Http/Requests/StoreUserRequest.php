<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|string|max:255|unique:users',
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',
            'password' => 'required|string',
            're_password' => 'required|string|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.unique' => 'Email này đã tồn tại. Hãy nhập email khác.',
            'email.string' => 'Email phải là dạng ký tự.',
            'email.max' => 'Độ dài email tối đa là 255 ký tự.',
            'name.required' => 'Bạn chưa nhập họ tên.',
            'name.string' => 'Họ tên phải là dạng ký tự.',
            'user_catalogue_id.gt' => 'Bạn chưa chọn nhóm thành viên',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            're_password.required' => 'Bạn chưa nhập lại mật khẩu.',
            're_password.same' => 'Mật khẩu không khớp.'
        ];
    }
}

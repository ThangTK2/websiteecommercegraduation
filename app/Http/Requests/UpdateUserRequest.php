<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => 'required|email|string|max:255|unique:users,email,'.$this->id.'', //nó sẽ bỏ qua email hiện tại
            'name' => 'required|string',
            'user_catalogue_id' => 'gt:0',
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
        ];
    }
}

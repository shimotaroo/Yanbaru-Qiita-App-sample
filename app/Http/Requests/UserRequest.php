<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $uniqueEmail = 'unique:users,email,' . Auth::id();
        return [
            'name' => ['required', 'string', 'max:255'],
            'term' => ['required', 'numeric', 'max:2'],
            'email' => ['required', 'string', 'email', 'max:255', $uniqueEmail],
        ];
    }

    /**
     * バリデーションメッセージの日本語化
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'term' => '期数',
            'email' => 'メールアドレス',
        ];
    }
}

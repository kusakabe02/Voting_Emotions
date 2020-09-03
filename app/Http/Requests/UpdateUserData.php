<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserData extends FormRequest
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
        return [
            //ユーザ名・メールアドレスのバリデーション
            'name' => 'required',
            'mail' => 'required|email|max:100'
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'ユーザー名を入力してください。',
          'mail.required'  => 'メールアドレスを入力してください。',
          'mail.email'  => 'メールアドレスとして正しい形式ではありません。',
          'mail.max'  => 'メールアドレスは100文字以内で入力してください。'
      ];
    }
}

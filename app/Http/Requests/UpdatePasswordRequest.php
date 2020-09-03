<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordRequest extends FormRequest
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
            //パスワードが間違っていた場合
            'new-password' => [
              'required',
              function($attribute,$value,$fail){
                if(!(\Hash::check($value, \Auth::user()->password))){
                  return $fail('現在のパスワード入力に誤りがあります。');
                }
              },
            ],
            'new-password' => 'required|string|min:6|confirmed|different:current-password',


        ];
    }

    public function messages(){
      return [
        'new-password.min' => 'パスワードは6文字以上で入力してください。',
        'new-password.different' => '新しいパスワードと現在のパスワードは異なる必要があります。',
        'new-password.confirmed' => '新しいパスワードの確認が一致しません。'
      ];
    }
}

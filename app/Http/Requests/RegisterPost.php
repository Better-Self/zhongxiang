<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Support\Facades\Validator;

class RegisterPost extends FormRequest
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
        $this->boot();
        return [
            'name' => 'required',
            'email' => 'sometimes|required|email',
            'password' => 'required|alpha_dash|min:8|confirmed',
            'phone' => 'required|check_phone',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '用户名不能为空！',
            'email.required' => '邮箱不能为空!',
            'email.email' => '邮箱格式不符合!',
            'password.required' => '密码不能为空!',
            'password.alpha_dash' => '密码格式不符合!',
            'password.min' => '密码长度不符合!',
            'phone.required' => '手机不能为空!',
            'phone.check_phone' => '手机格式不符合!',
            'password.confirmed' => '两次密码不相同!',
        ];
    }

    public function boot(){
        Validator::extend('check_phone', function ($attribute, $value, $parameters, $validator) {
            if(!preg_match("/^1[345789]{1}\d{9}$/",$value)){
                return false;
            }
            return true;
        });
    }
}

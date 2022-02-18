<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'account' => 'required|min:2|max:20',
            'password' => 'required|min:8|max:20',
            'captcha' => 'required|captcha'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'username' => __('frontend.login_fail_username_pw_error'),
    //         'password' => __('frontend.login_fail_username_pw_error'),
    //         'phone' => __('frontend.login_fail_phone'),
    //     ];
    // }
}

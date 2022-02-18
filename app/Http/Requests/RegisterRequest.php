<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class RegisterRequest extends FormRequest
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
            'username' => 'required|min:2|max:20',
            'account' => 'required|min:2|max:20',
            'phone' => 'required|digits:10',
            'phone_code' => 'required|digits:4',
            'password' => 'required|min:8|max:20|confirmed',
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

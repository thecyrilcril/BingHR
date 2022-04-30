<?php

namespace App\Http\Requests;

use App\Rules\Ngmobile;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            $user = \App\Models\User::where('email', $this->email)->firstOrFail();
            return [
                'first_name' => 'required|alpha|between:3, 20',
                'last_name' => 'required|alpha|between:3, 20',
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id), 'email'],
                'mobile_number' => ['required', Rule::unique('users')->ignore($user->id), 'digits_between:10,14', new Ngmobile],
                'role_id' => 'required|numeric',
                'permission_id' => 'required|numeric',
                'user_name' => ['required', 'string', Rule::unique('users')->ignore($user->id), 'between:6, 10'],
                'password' => 'required|confirmed',
            ];
        }

        public function messages()
        {
            return [
                'first_name.required' => 'please enter users first name.',
                'last_name.required' => 'please enter users last name.',
                'email.required' => 'please enter users email.',
                'mobile_number.required' => 'please enter users mobile number.',
                'role_id.required' => 'please select users role.',
                'permission_id.required' => 'please select users permission.',
                'user_name.required' => 'please enter users username.',
                'password.required' => 'please enter user password.',
            ];
        }
}

<?php

namespace App\Http\Requests;

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
        return [
            'name' => 'required|min:6|max:30',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ' Name is required',
            'name.min' => ' Name must be at least 6 characters long',
            'email.required' => ' Email is required',
            'email.unique' => ' Email has already been taken',
            'password.required' => 'Password is required',
            'password.min' => 'Your password must be at least 8 characters long.',
            'password.max' => 'Your password must not exceed 50 characters long.',

        ];
    }
}

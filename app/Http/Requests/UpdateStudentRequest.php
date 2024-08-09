<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'email' => 'required|unique:student',
            'mobileNo' => 'required|min:11',
            'cnic' => 'required|min:13',
            'qualification' => 'required',
            'degree' => 'required',
        ];
    }
}

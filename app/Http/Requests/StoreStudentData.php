<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentData extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_1' => 'required|min:4|max:10',
            'email_1' => 'required',
            'phone_1' => 'required|digits_between:9,11',
        ];
    }
    public function messages(){
        return [
            'name_1.required' => 'Name is Needed ?',
            'name_1.min' => 'Minimum value should atleast four chars!',
            'name_1.max' => 'Sorry! you are Exeeded 10 chars long',
            'email_1.required' => 'Email is Needed?',
            'phone_1.required' => 'Phone is Needed?',
            'phone_1.digits_between' => 'Phone number should be between 9 to 11',
        ];
    }
}

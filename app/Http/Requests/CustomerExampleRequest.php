<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerExampleRequest extends FormRequest
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
            'name'    => 'required|min:8|max:80',
            'dob'     => 'required|date',
            'email'   => 'required|email',
            'city_id' => 'required',

        ];
    }

    public function message()
    {
        $messages = [
            'name.required'           => 'We need to know your full name!',
            'name.min'                => 'Name size must be between 8 and 80',
            'name.max'                => 'Name size must be between 8 and 80',
            'dob.required'            => 'We need to know your date of birth',
            'emai.required'           => 'We need to know your email',
            'city_id.required'        => 'We need to know your city',
        ];
        return $messages;
    }
}

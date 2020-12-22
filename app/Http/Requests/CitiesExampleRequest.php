<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitiesExampleRequest extends FormRequest
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
            'name' => 'required|min:3|max:15'
        ];
    }

    public function message()
    {
        $messages = [
            'name.required' => 'We need to know your full name',
            'name.min'      => 'Name size must be between 3 and 15',
            'name.max'      => 'Name size must be between 3 and 15',
          ];
          return $messages;
    }
}

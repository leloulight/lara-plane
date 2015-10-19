<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SpaceshipRequest extends Request
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
//            'name' => "required",
//            'description' => 'required',
//            'preview' => "mimes:png,jpeg",
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute не должно быть пустым!',
            'mimes' => 'Поле preview должно быть .png, .jpeg',
        ];
    }
}

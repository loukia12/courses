<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CourseDataValidator extends FormRequest
{
    /**
     * Get the validation rules that apply to POST the request.
     *
     * @return array
     */
    public static function createFormValidation()
    {
        return ([
            'title'       => 'required|string|max:100',
            'description' => 'string|max:255'
        ]);
    }


    /**
     * Get the validation rules that apply to PUT the request.
     *
     * @return array
     */
    public static function updateFormValidation()
    {
        return ([
            'title'       => 'string|max:100',
            'description' => 'string|max:255'
        ]);
    }


    public static function courseIdValidation()
    {
        return [
            'id'  => 'required|integer'
        ];
    }
}

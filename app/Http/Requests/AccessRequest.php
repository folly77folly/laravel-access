<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessRequest extends FormRequest
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
            //
            'name'=>['required', 'unique:accesses'],
            'email'=>['required', 'email', 'unique:accesses'],
            'pin'=>['required', 'numeric', 'digits:6', 'unique:accesses'],
        ];
    }
}

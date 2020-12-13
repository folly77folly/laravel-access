<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Log;
// use Validator;
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


    public $validator = null;
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
        Log::info('Email Sending Failed');
        if (Request::is('api*')){
            throw new HttpResponseException(response()->json([
                "status"=> 0,
                "message"=> "Double Entry is not allowed",
                "data"=>$validator->errors()
            ],422)); 
        }else{
            if ($this->validator->fails()){
                return response()->json($validator->errors(), 400);
            }
        }
    }

    public function response(){

        if (Request::is('api*')){
            var_dump('hello');
            return response()->json($validator->errors(), 400);
        }
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

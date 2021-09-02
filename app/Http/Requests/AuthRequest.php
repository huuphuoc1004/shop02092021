<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
    			'username' => 'required|min:2',
    			'password' => 'required',
    	];
    }
    public function messages(){
    	return [
    			'username.required'		=> 'Username không được để trống',
                'username.min'		=> 'Username không được nhỏ hơn 2',
    			'password.required' 	=> 'Password không được để trống',
    	];
    }
}

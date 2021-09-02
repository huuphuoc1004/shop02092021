<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        		'password' => 'required|min:2',
        		'cpassword' => 'required|same:password',
        		'fullname' => 'required|min:5',
        ];
    }
    public function messages(){
    	return [
    			'username.required'		=> 'Username không được để trống',
    			'username.min' 			=> 'Username phải ít nhất có 2 ký tự',
    			'password.required'		=> 'Password không được để trống',
    			'password.min' 			=> 'Password phải ít nhất có 2 ký tự',
    			'cpassword.required'	=> 'Confirm Password không được để trống',
    			'cpassword.same'		=> 'Password phải giống ở trên',
    			'fullname.required'		=> 'Fullname không được để trống',
    			'fullname.min' 			=> 'Fullname phải ít nhất có 2 ký tự',
    	];
    }
}

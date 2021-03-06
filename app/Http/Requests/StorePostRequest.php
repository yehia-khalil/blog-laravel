<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;


class StorePostRequest extends FormRequest
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
            'title'=>['required','min:3','unique:blogs,title'],
            'description'=>['required','min:10'],
            'id'=> 'exists:users'
        ];
    }

    public function messages()
    {
        return[
          'id.exists'=>'User doesnt exist, stop hacking'  
        ];
    }

}

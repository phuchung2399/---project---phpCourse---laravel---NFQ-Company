<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'txttitle'                => 'required',
            'txtdescription'          => 'required',
            'txtlink'                 => 'required',
            'txtcategory'             => 'required',
            'txtcomments'             => 'required',
        ];
    }
    public function messages()
    {
        return [
            'txttitle.required'       => 'You have not entered a title!',
            'txtdescription.required' => 'You have not entered a description!',
            'txtlink.required'        => 'You have not entered a link!',
            'txtcategory.required'    => 'You have not entered a category!',
            'txtcomments.required'    => 'You have not entered a comments!',
        ];
    }
}

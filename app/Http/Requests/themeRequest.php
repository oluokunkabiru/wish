<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class themeRequest extends FormRequest
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
            'name' =>'required|string|unique:themes',
            'category' =>'required',
            'style' =>['required','file', 'mimes:zip'],
            'script' =>['required','file','mimes:zip'],
            'interface' =>['required', 'file'],
            'preview' =>['required','image', 'mimes:png,jpg,jpeg'],
            'payment' =>'required|string',
            'price' =>'required_if:payment,paid|numeric',
            'description' => 'required|string'
        ];
    }
}

<?php

namespace CodeCommerce\Http\Requests;

use CodeCommerce\Http\Requests\Request;

class ProductsRequest extends Request
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
            'name'=>'required|min:3',
            'description'=>'required'
        ];
    }

    public function messages()
    {
       return[
           //'name.required'=>'O campo nome é obrigatório',
           //'name.min'=>'O campo nome deve possuir tamanho mínimo de 3 caracteres',
       ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'numserie_pro' => 'required|max:20',
            'nom_pro' => 'required|max:30',
            //'fecven_pro' => 'required',
            'cantidad_pro' => 'required',
            'precio_pro' => 'required',
        ];
    }
}

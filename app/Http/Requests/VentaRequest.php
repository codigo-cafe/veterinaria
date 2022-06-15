<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
            'productos' => 'required',
            'id_clie' => 'required',
            'total_ven' => 'required',
        ];
    }

    public function messages($value='')
    {
        return [
            'productos.required' => 'Se requiere que haya agregado al menos un producto a su lista de compras',
            'id_clie.required' => 'El campo cliente es obligatorio.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtencionRequest extends FormRequest
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
            'fech_aten' => 'required',
            'tipo_aten' => 'required|max:100',
            'peso_aten' => 'required',
            'temp_aten' => 'required',
            'descrip_aten' => 'required|max:100',
            'obtencion_masc' => 'required|max:100',
            'id_masc' => 'required',
        ];
    }
}

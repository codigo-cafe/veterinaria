<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
        $rules = [
            'nom_clie' => 'required|max:50',
            'ape_clie' => 'required|max:50',
            'ocupacion_clie' => 'required|max:50',
            'direccion_clie' => 'required|max:50',
            'sexo_clie' => 'required|max:50',
            'edad_clie' => 'required',
            'celular_clie' => 'required|max:20',
        ];
        if ($this->method() === 'PUT') {
            $rules['cedula_clie'] = 'required|max:15|unique:clientes,cedula_clie,' . $this->route('cliente')->id_clie . ',id_clie';
            $rules['correo_clie'] = 'required|unique:clientes,correo_clie,' . $this->route('cliente')->id_clie . ',id_clie';
        } else if($this->method() === 'POST'){
            $rules['cedula_clie'] = 'required|max:15|unique:clientes,cedula_clie';
            $rules['correo_clie'] = 'required|unique:clientes,correo_clie';
        }
        return $rules;
    }
}

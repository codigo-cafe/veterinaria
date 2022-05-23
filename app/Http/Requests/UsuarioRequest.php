<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nom_per' => 'required|max:50',
            'ape_per' => 'required|max:50',
            'dir_per' => 'required|max:50',
            'celular_per' => 'required|max:20',
            'sexo_per' => 'required|max:50',
            'edad_per' => 'required',
            'fecnac_per' => 'required',
            'fecinicio_per' => 'required',
            'fecfinal_per' => 'required',
            'cargo_per' => 'required|max:50',
            'profe_per' => 'required|max:50',
        ];
        if ($this->method() === 'PUT') {
            $rules['cedula_per'] = 'required|max:15|unique:personal,cedula_per,' . $this->route('usuario')->id;
            $rules['correo_per'] = 'required|unique:personal,correo_per,' . $this->route('usuario')->id;
        } else if($this->method() === 'POST'){
            $rules['cedula_per'] = 'required|max:15|unique:personal,cedula_per';
            $rules['correo_per'] = 'required|unique:personal,correo_per';
            $rules['contrasena_per'] = 'required|confirmed|min:6';
        }
        return $rules;
    }
}

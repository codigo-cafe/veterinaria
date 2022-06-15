<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaRequest extends FormRequest
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
            'nom_masc' => 'required|max:30',
            'raza_masc' => 'required|max:30',
            'sexo_masc' => 'required',
            'color_masc' => 'required|max:30',
            'fecnac_masc' => 'required',
            'edad_masc' => 'required',
            'espe_masc' => 'required|max:30',
            'peso_masc' => 'required',
            'pelaje_masc' => 'required|max:30',
            'vivienda_masc' => 'required|max:30',
            'alimento_masc' => 'required|max:50',
            'id_clie' => 'required',
            'imagenes_masc.*' => 'mimes:jpg,jpeg,png,bmp|max:5120',
        ];
    }

    public function messages($value='')
    {
        return [
            'imagenes_masc.*.required' => 'Sube al menos una imagen',
            'imagenes_masc.*.mimes' => 'Solo se permiten imágenes jpeg, png, jpg y bmp',
            'imagenes_masc.*.max' => '¡Lo siento! El tamaño máximo permitido para una imagen es de 5 MB.',
        ];
    }
}

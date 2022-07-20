<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamenRequest extends FormRequest
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
            'titu_exa' => 'required',
            'descrip_exa' => 'required',
            'id_masc' => 'required',
        ];
        if($this->method() === 'POST'){
            $rules['img_exa'] = 'required|mimes:jpg,jpeg,png,bmp|max:5120';
        }
        return $rules;
    }

    public function messages($value='')
    {
        return [
            'img_exa.*.required' => 'Sube al menos una imagen',
            'img_exa.*.mimes' => 'Solo se permiten imágenes jpeg, png, jpg y bmp',
            'img_exa.*.max' => '¡Lo siento! El tamaño máximo permitido para una imagen es de 5 MB.',
        ];
    }
}

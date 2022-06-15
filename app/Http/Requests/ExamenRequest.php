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
        return [
            'examenes' => 'required',
            'id_masc' => 'required',
        ];
    }

    public function messages($value='')
    {
        return [
            'examenes.required' => 'Se requiere que haya agregado al menos un examen a su lista de examenes',
            'id_masc.required' => 'El campo mascota es obligatorio.',
        ];
    }
}

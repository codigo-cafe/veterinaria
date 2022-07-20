<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacunaRequest extends FormRequest
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
            'nom_vac' => 'required',
            'dosis_vac' => 'required',
            'fecapl_vac' => 'required',
            'fecprox_vac' => 'required',
            'id_masc' => 'required',
        ];
    }
}

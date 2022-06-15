<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HospitalizacionRequest extends FormRequest
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
            'fecing_hosp' => 'required',
            'fecfin_hosp' => 'required',
            'estado_hosp' => 'required',
            'descrip_hosp' => 'required',
            'signologia' => 'required',
            'temp_corp' => 'required',
            'color_mucosa' => 'required',
            'palpa_abdominal' => 'required',
            'piel' => 'required',
            'frecue_cardia' => 'required',
            'id_masc' => 'required',
        ];
    }
}

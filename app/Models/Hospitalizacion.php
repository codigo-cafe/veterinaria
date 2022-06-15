<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitalizacion extends Model
{
    use HasFactory;

    protected $primaryKey = "ficha_hosp";
    public $timestamps = false;
    public $table = "hospitalizaciones";
    protected $fillable = [
        'fecing_hosp',
        'fecfin_hosp',
        'estado_hosp',
        'descrip_hosp',
        'signologia',
        'temp_corp',
        'color_mucosa',
        'palpa_abdominal',
        'piel',
        'frecue_cardia',
        'id_masc',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_masc');
    }
}

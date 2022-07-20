<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $primaryKey = "id_vac";
    public $timestamps = false;
    public $table = "vacunas";
    protected $fillable = [
        'nom_vac',
        'dosis_vac',
        'fecapl_vac',
        'fecprox_vac',
        'id_masc',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_masc');
    }
}

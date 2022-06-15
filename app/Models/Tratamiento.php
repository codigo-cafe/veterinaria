<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;

    protected $primaryKey = "id_tra";
    public $timestamps = false;
    public $table = "tratamientos";
    protected $fillable = [
        'tiempo_tra',
        'dosis_tra',
        'fecing_tra',
        'fecfin_tra',
        'id_masc',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_masc');
    }
}

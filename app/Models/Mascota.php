<?php

namespace App\Models;

use App\Models\Atencion;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Examen;
use App\Models\Hospitalizacion;
use App\Models\Imagen;
use App\Models\Tratamiento;
use App\Models\Vacuna;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $primaryKey = "id_masc";
    public $timestamps = false;
    public $table = "mascotas";
    protected $fillable = [
        'nom_masc',
        'raza_masc',
        'sexo_masc',
        'color_masc',
        'fecnac_masc',
        'edad_masc',
        'espe_masc',
        'peso_masc',
        'pelaje_masc',
        'vivienda_masc',
        'alimento_masc',
        'id_clie',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clie');
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'id_masc');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_masc');
    }

    public function vacunas()
    {
        return $this->hasMany(Vacuna::class, 'id_masc');
    }

    public function examenes()
    {
        return $this->hasMany(Examen::class, 'id_masc');
    }

    public function hospitalizaciones()
    {
        return $this->hasMany(Hospitalizacion::class, 'id_masc');
    }

    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'id_masc');
    }

    public function Atenciones()
    {
        return $this->hasMany(Atencion::class, 'id_masc');
    }
}

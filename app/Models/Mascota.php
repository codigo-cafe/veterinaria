<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Imagen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
}

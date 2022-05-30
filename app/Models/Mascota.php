<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}

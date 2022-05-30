<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = "id_clie";
    public $timestamps = false;
    public $table = "clientes";
    protected $fillable = [
        'cedula_clie',
        'nom_clie',
        'ape_clie',
        'ocupacion_clie',
        'direccion_clie',
        'sexo_clie',
        'edad_clie',
        'correo_clie',
        'celular_clie',
    ];

    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}

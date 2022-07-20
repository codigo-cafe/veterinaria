<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Tratamiento;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = "id_pro";
    public $timestamps = false;
    public $table = "productos";
    protected $fillable = [
        'numserie_pro',
        'nom_pro',
        'fecven_pro',
        'cantidad_pro',
        'precio_pro',
    ];

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'producto_venta');
    }

    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class, 'producto_tratamiento', 'id_tra', 'id_pro')->withPivot('tiempo_tra', 'dosis_tra', 'fecing_tra', 'fecfin_tra');
    }
}

<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atencion extends Model
{
    use HasFactory;

    protected $primaryKey = "id_aten";
    public $timestamps = false;
    public $table = "atenciones";
    protected $fillable = [
        'fech_aten',
        'tipo_aten',
        'peso_aten',
        'temp_aten',
        'descrip_aten',
        'obtencion_masc',
        'id_masc',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_masc');
    }
}

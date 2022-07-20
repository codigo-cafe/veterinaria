<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $primaryKey = "id_cita";
    public $timestamps = false;
    public $table = "citas";
    protected $fillable = [
        'tipo_cita',
        'id_masc',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_masc');
    }
}

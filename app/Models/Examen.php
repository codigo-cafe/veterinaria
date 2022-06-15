<?php

namespace App\Models;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $primaryKey = "id_exa";
    public $timestamps = false;
    public $table = "examenes";
    protected $fillable = [
        'titu_exa',
        'img_exa',
        'descrip_exa',
        'id_masc',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_masc');
    }
}

<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $primaryKey = "id_ven";
    public $timestamps = false;
    public $table = "ventas";
    protected $fillable = [
        'total_ven',
        'fec_ven',
        'id_clie',
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_venta');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_clie');
    }
}

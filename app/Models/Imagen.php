<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $primaryKey = "id_img";
    public $timestamps = false;
    public $table = "imagenes";
    protected $guarded = [];
}

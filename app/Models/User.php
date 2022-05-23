<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    public $timestamps = false;
    public $table = "personal";
    protected $fillable = [
        'cedula_per',
        'nom_per',
        'ape_per',
        'dir_per',
        'celular_per',
        'correo_per',
        'contrasena_per',
        'sexo_per',
        'edad_per',
        'fecnac_per',
        'fecinicio_per',
        'fecfinal_per',
        'cargo_per',
        'profe_per',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'contrasena_per',
        'remember_token',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected function defaultProfilePhotoUrl()
    {
        $nombre = $this->nom_per[0];
        $apellido =  $this->ape_per[0];
        return 'https://ui-avatars.com/api/?name=' . urlencode($nombre . ' ' . $apellido) . '&color=7F9CF5&background=EBF4FF';
    }

    public function setContrasenaPerAttribute($contrasena_per)
    {
        $this->attributes['contrasena_per'] = bcrypt($contrasena_per);
    }
}

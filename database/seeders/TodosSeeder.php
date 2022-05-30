<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $useradmin=User::create([
        	'nombre' => 'admin mario',
            'documento' => '1085320995',
        	'email' => 'mario@gmail.com',
            'telefono' => '3117235354',
        	'password' => Hash::make('admin'),
        	'rol' => 'capataz',
        ]);
        */

        User::create([
            'cedula_per' => '123456789',
            'nom_per' => 'Juan Camilo',
            'ape_per' => 'Saenz Valencia',
            'dir_per' => 'Direccion',
            'celular_per' => '789456123',
            'correo_per' => 'juan@hotmail.com',
            'contrasena_per' => 'password', // $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
            'sexo_per' => 'Masculino',
            'edad_per' => 25,
            'fecnac_per' => Carbon::createFromFormat('Y-m-d', '2000-04-10'),
            'fecinicio_per' => Carbon::createFromFormat('Y-m-d', '2022-05-15'),
            'fecfinal_per' => Carbon::createFromFormat('Y-m-d', '2025-05-15'),
            'cargo_per' => 'Administrador',
            'profe_per' => 'Doctor',
        ]);

        Cliente::create([
            'cedula_clie' => '123123',
            'nom_clie' => 'Sandra',
            'ape_clie' => 'Aparicio',
            'ocupacion_clie' => 'Comerciante',
            'direccion_clie' => 'Direccion cliente',
            'sexo_clie' => 'Femenino',
            'edad_clie' => 28,
            'correo_clie' => 'sandra@hotmail.com',
            'celular_clie' => '117887541567',
        ]);

        Cliente::create([
            'cedula_clie' => '222222',
            'nom_clie' => 'Carla',
            'ape_clie' => 'Mercado',
            'ocupacion_clie' => 'Comerciante',
            'direccion_clie' => 'Direccion cliente',
            'sexo_clie' => 'Femenino',
            'edad_clie' => 30,
            'correo_clie' => 'carla@hotmail.com',
            'celular_clie' => '456897987',
        ]);

        Mascota::create([
            'nom_masc' => 'Boby',
            'raza_masc' => 'San Bernardo',
            'sexo_masc' => 'Macho',
            'color_masc' => 'Negro',
            'fecnac_masc' => Carbon::createFromFormat('Y-m-d', '2020-04-10'),
            'edad_masc' => 2,
            'espe_masc' => 'Can',
            'peso_masc' => 2.500,
            'pelaje_masc' => 'Abundante',
            'vivienda_masc' => 'Vivienda Mascota',
            'alimento_masc' => 'Alimento balanceado',
            'id_clie' => 1,
        ]);

        Mascota::create([
            'nom_masc' => 'Cari',
            'raza_masc' => 'Coli',
            'sexo_masc' => 'Hembra',
            'color_masc' => 'Marron',
            'fecnac_masc' => Carbon::createFromFormat('Y-m-d', '2020-04-10'),
            'edad_masc' => 5,
            'espe_masc' => 'Can',
            'peso_masc' => 5.000,
            'pelaje_masc' => 'Abundante',
            'vivienda_masc' => 'Vivienda Mascota',
            'alimento_masc' => 'Alimento balanceado',
            'id_clie' => 2,
        ]);
    }
}

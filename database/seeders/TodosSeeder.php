<?php

namespace Database\Seeders;

use App\Models\Atencion;
use App\Models\Cliente;
use App\Models\Examen;
use App\Models\Hospitalizacion;
use App\Models\Mascota;
use App\Models\Producto;
use App\Models\Tratamiento;
use App\Models\User;
use App\Models\Venta;
use Carbon\Carbon;
use DB;
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

        Producto::create([
            'numserie_pro' => '4A185048W',
            'nom_pro' => 'Alimento Balanceado',
            'fecven_pro' => Carbon::createFromFormat('Y-m-d', '2022-10-10'),
            'cantidad_pro' => 10,
            'precio_pro' => 5.500,
        ]);

        Venta::create([
            'total_ven' => 11.000,
            'id_clie' => 1,
        ]);

        DB::table('producto_venta')->insert(array(
            array(
                'id_pro' => 1,
                'id_ven' => 1,
                'cant_ven' => 2,
                'precio_pro' => 5.500,
            ),
        ));

        Atencion::create([
            'fech_aten' => Carbon::createFromFormat('Y-m-d', '2022-05-04'),
            'tipo_aten' => 'Vacunación',
            'peso_aten' => 4.200,
            'temp_aten' => 35,
            'descrip_aten' => 'Paciente con temperatura de 35 grados',
            'obtencion_masc' => 'adopción',
            'id_masc' => 1,
        ]);

        Hospitalizacion::create([
            'fecing_hosp' => Carbon::createFromFormat('Y-m-d', '2022-05-04'),
            'fecfin_hosp' => Carbon::createFromFormat('Y-m-d', '2022-05-05'),
            'estado_hosp' => 'estado de salud del paciente',
            'descrip_hosp' => 'descripción hospitalización del paciente',
            'signologia' => 'signos del paciente',
            'temp_corp' => 30,
            'color_mucosa' => 'verde',
            'palpa_abdominal' => 100,
            'piel' => 'estado de la piel del paciente',
            'frecue_cardia' => 100,
            'id_masc' => 2,
        ]);

        Examen::create([
            'titu_exa' => 'Análisis de Sangre',
            'img_exa' => '',
            'descrip_exa' => 'Primer examen de la mascota',
            'id_masc' => 2,
        ]);

        Tratamiento::create([
            'tiempo_tra' => '24 horas',
            'dosis_tra' => 10,
            'fecing_tra' => Carbon::createFromFormat('Y-m-d', '2022-05-04'),
            'fecfin_tra' => Carbon::createFromFormat('Y-m-d', '2022-05-05'),
            'id_masc' => 2,
        ]);
    }
}

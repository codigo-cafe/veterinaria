<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Carbon\Carbon;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
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
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}

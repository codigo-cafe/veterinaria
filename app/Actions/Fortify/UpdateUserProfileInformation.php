<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Session;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'nom_per' => ['required', 'string', 'max:50'],
            'ape_per' => ['required', 'string', 'max:50'],
            'dir_per' => ['required', 'string', 'max:50'],
            'celular_per' => ['required', 'string', 'max:20'],
            'sexo_per' => ['required', 'string', 'max:50'],
            'edad_per' => ['required'],
            'fecnac_per' => ['required'],
            'fecinicio_per' => ['required'],
            'fecfinal_per' => ['required'],
            'cargo_per' => ['required', 'string', 'max:50'],
            'profe_per' => ['required', 'string', 'max:50'],
            'cedula_per' => ['required', 'string', 'max:15', Rule::unique('personal')->ignore($user->id)],
            'correo_per' => ['required', 'email', 'max:255', Rule::unique('personal')->ignore($user->id)],
        ])->validateWithBag('updateProfileInformation');

        if ($input['correo_per'] !== $user->correo_per &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'nom_per' => $input['nom_per'],
                'ape_per' => $input['ape_per'],
                'dir_per' => $input['dir_per'],
                'celular_per' => $input['celular_per'],
                'sexo_per' => $input['sexo_per'],
                'edad_per' => $input['edad_per'],
                'fecnac_per' => $input['fecnac_per'],
                'fecinicio_per' => $input['fecinicio_per'],
                'fecfinal_per' => $input['fecfinal_per'],
                'cargo_per' => $input['cargo_per'],
                'profe_per' => $input['profe_per'],
                'cedula_per' => $input['cedula_per'],
                'correo_per' => $input['correo_per'],
            ])->save();
            return redirect('atenciones.index')->with('status', 'Profile updated!');
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}

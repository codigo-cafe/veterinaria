<template>
    <form @submit.prevent="submit">
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Actualizar Perfil</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.cedula_per }">
                            <label>Cédula</label>
                            <input type="text"
                                class="form-control"
                                v-model="form.cedula_per"
                                placeholder="Cédula de Identidad"
                                autofocus>
                            <div v-if="errors.cedula_per" class="invalid-feedback">{{ errors.cedula_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.nom_per }">
                            <label>Nombre</label>
                            <input type="text"
                                class="form-control"
                                v-model="form.nom_per"
                                placeholder="Nombre del Usuario">
                            <div v-if="errors.nom_per" class="invalid-feedback">{{ errors.nom_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.ape_per }">
                            <label>Apellidos</label>
                            <input type="text"
                                class="form-control"
                                v-model="form.ape_per"
                                placeholder="Apellidos del Usuario">
                            <div v-if="errors.ape_per" class="invalid-feedback">{{ errors.ape_per }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.correo_per }">
                            <label>Correo</label>
                            <input type="email"
                                class="form-control"
                                v-model="form.correo_per"
                                placeholder="Correo Electrónico">
                            <div v-if="errors.correo_per" class="invalid-feedback">{{ errors.correo_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.dir_per }">
                            <label>Dirección</label>
                            <input type="text"
                                class="form-control"
                                v-model="form.dir_per"
                                placeholder="Dirección del Usuario">
                            <div v-if="errors.dir_per" class="invalid-feedback">{{ errors.dir_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.celular_per }">
                            <label>Celular</label>
                            <input type="text"
                                class="form-control"
                                v-model="form.celular_per"
                                placeholder="Número Telefónico">
                            <div v-if="errors.celular_per" class="invalid-feedback">{{ errors.celular_per }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.cargo_per }">
                            <label for="cargo" class="ms-0">Cargo</label>
                            <select v-model="form.cargo_per" class="form-control" id="cargo">
                                <option value="">Seleccione un Cargo</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Doctor">Doctor</option>
                            </select>
                            <div v-if="errors.cargo_per" class="invalid-feedback">{{ errors.cargo_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.profe_per }">
                            <label>Profesión</label>
                            <input type="text"
                                class="form-control"
                                v-model="form.profe_per"
                                placeholder="Profesión del Usuario">
                            <div v-if="errors.profe_per" class="invalid-feedback">{{ errors.profe_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.fecnac_per }">
                            <label>Fecha de Nacimiento</label>
                            <input type="date"
                                class="form-control"
                                v-model="form.fecnac_per"
                                placeholder="Fecha de Nacimiento"
                                :max="limitmax"
                                @change="changedate">
                            <div v-if="errors.fecnac_per" class="invalid-feedback">{{ errors.fecnac_per }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.edad_per }">
                            <label>Edad</label>
                            <input type="number"
                                class="form-control"
                                v-model="form.edad_per"
                                placeholder="Edad del Usuario">
                            <div v-if="errors.edad_per" class="invalid-feedback">{{ errors.edad_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.sexo_per }">
                            <label for="sexo" class="ms-0">Sexo</label>
                            <select v-model="form.sexo_per" class="form-control" id="sexo">
                                <option value="">Seleccione un Sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            <div v-if="errors.sexo_per" class="invalid-feedback">{{ errors.sexo_per }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.fecinicio_per }">
                            <label>Fecha de Ingreso</label>
                            <input type="date"
                                class="form-control"
                                v-model="form.fecinicio_per"
                                placeholder="Fecha de Ingreso">
                            <div v-if="errors.fecinicio_per" class="invalid-feedback">{{ errors.fecinicio_per }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': errors.fecfinal_per }">
                            <label>Fecha de Terminación Laboral</label>
                            <input type="date"
                                class="form-control"
                                v-model="form.fecfinal_per"
                                placeholder="Fecha de Terminación Laboral">
                            <div v-if="errors.fecfinal_per" class="invalid-feedback">{{ errors.fecfinal_per }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 col-12 actions text-end ms-auto">
                        <button type="submit" class="btn bg-gradient-blue mb-0 ms-1">Actualizar Perfil</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';

export default {
    components: {
        Link,
    },

    props: {
        usuario: Object,
        errors: Object
    },

    data() {
        return {
            form: useForm({
                cedula_per: this.usuario.cedula_per,
                nom_per: this.usuario.nom_per,
                ape_per: this.usuario.ape_per,
                dir_per: this.usuario.dir_per,
                celular_per: this.usuario.celular_per,
                correo_per: this.usuario.correo_per,
                cargo_per: this.usuario.cargo_per,
                profe_per: this.usuario.profe_per,
                fecnac_per: this.usuario.fecnac_per,
                edad_per: this.usuario.edad_per,
                sexo_per: this.usuario.sexo_per,
                fecinicio_per: this.usuario.fecinicio_per,
                fecfinal_per: this.usuario.fecfinal_per,
            }),
            limitmax: null,
        }
    },

    mounted(){
        this.limitmax = moment().subtract(18, 'years').format('YYYY-MM-DD');
    },

    methods: {
        submit() {
            this.form.put(route('user-profile-information.update'), {
                errorBag: 'updateProfileInformation',
                preserveScroll: true,
                onSuccess: () => {
                    console.log(this.$page.props.flash.status)
                },
            });
        },

        changedate() {
            this.form.edad_per = moment().diff(this.form.fecnac_per, 'years');
        }
    }
}
</script>
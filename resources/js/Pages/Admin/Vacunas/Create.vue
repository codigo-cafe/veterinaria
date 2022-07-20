<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-10 col-md-12 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Registrar Vacuna</h5>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.id_masc }">
										<label for="mascota" class="ms-0">Mascota</label>
										<select v-model="form.id_masc" class="form-control" id="mascota">
											<option value="">Seleccione una Mascota</option>
											<option :value="mascota.id_masc" v-for="mascota in mascotas" :key="mascota.id_masc">{{ mascota.nom_masc + " - " + mascota.cliente.nom_clie + " " + mascota.cliente.ape_clie }}</option>
										</select>
										<div v-if="errors.id_masc" class="invalid-feedback">{{ errors.id_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.nom_vac }">
										<label>Nombre de la Vacuna</label>
										<input type="text"
										class="form-control"
										v-model="form.nom_vac"
										placeholder="Nombre de la Vacuna">
										<div v-if="errors.nom_vac" class="invalid-feedback">{{ errors.nom_vac }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.dosis_vac }">
										<label>Dosis de la Vacuna</label>
										<input type="number"
										min='1'
										class="form-control"
										v-model="form.dosis_vac"
										placeholder="Dosis de la Vacuna">
										<div v-if="errors.dosis_vac" class="invalid-feedback">{{ errors.dosis_vac }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fecapl_vac }">
										<label>Fecha de Aplicación</label>
										<input type="date"
											class="form-control"
											v-model="form.fecapl_vac"
											placeholder="Fecha de aplicación de la dosis">
										<div v-if="errors.fecapl_vac" class="invalid-feedback">{{ errors.fecapl_vac }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fecprox_vac }">
										<label>Fecha Próxima</label>
										<input type="date"
											class="form-control"
											v-model="form.fecprox_vac"
											placeholder="Fecha de aplicación de la siguiente dosis">
										<div v-if="errors.fecprox_vac" class="invalid-feedback">{{ errors.fecprox_vac }}</div>
									</div>
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8 col-12 actions text-end ms-auto">
									<Link :href="route('vacunas.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
									<button type="submit" class="btn bg-gradient-blue mb-0 ms-1" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Guardar</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</app-layout>
</template>
<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout';
import { Link, useForm } from '@inertiajs/inertia-vue3';

export default {
	components: {
		AppLayout,
		Link,
	},

	props: {
		mascotas: Object,
		errors: Object
	},

	data() {
		return {
			form: useForm({
				nom_vac: '',
				dosis_vac: '',
				fecapl_vac: '',
				fecprox_vac: '',
				id_masc: '',
			}),
		}
	},

	mounted(){

	},

	methods: {
		submit() {
            this.form.post(route('vacunas.store'), {
                onSuccess: () => this.form.reset(),
            });
        },

        handleFilePondInit: function() {
            this.$refs.pond.getFiles();
        },
	}
}
</script>
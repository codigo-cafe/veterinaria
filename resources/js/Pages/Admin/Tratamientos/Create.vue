<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-10 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Registrar Hospitalización</h5>
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
										:class="{ 'is-invalid': errors.temp_corp }">
										<label>Temperatura de la Mascota</label>
										<input type="number"
											class="form-control"
											v-model="form.temp_corp"
											placeholder="Temperatura de la Mascota"
											autofocus>
										<div v-if="errors.temp_corp" class="invalid-feedback">{{ errors.temp_corp }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.estado_hosp }">
										<label>Salud de la Mascota</label>
										<input type="text"
											class="form-control"
											v-model="form.estado_hosp"
											placeholder="Salud de la Mascota">
										<div v-if="errors.estado_hosp" class="invalid-feedback">{{ errors.estado_hosp }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.signologia }">
										<label>Signos del Paciente</label>
										<input type="text"
											class="form-control"
											v-model="form.signologia"
											placeholder="Signos del Paciente">
										<div v-if="errors.signologia" class="invalid-feedback">{{ errors.signologia }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.color_mucosa }">
										<label>Mucosa</label>
										<input type="text"
											class="form-control"
											v-model="form.color_mucosa"
											placeholder="Color de la Mucosa">
										<div v-if="errors.color_mucosa" class="invalid-feedback">{{ errors.color_mucosa }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.palpa_abdominal }">
										<label>Palpa Abdominal</label>
										<input type="number"
											class="form-control"
											v-model="form.palpa_abdominal"
											placeholder="Palpa abdominal de la Mascota">
										<div v-if="errors.palpa_abdominal" class="invalid-feedback">{{ errors.palpa_abdominal }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.piel }">
										<label>Piel</label>
										<input type="text"
											class="form-control"
											v-model="form.piel"
											placeholder="Piel de la Mascota">
										<div v-if="errors.piel" class="invalid-feedback">{{ errors.piel }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.frecue_cardia }">
										<label>Frecuencia Cardiaca</label>
										<input type="number"
											class="form-control"
											v-model="form.frecue_cardia"
											placeholder="Frecuencia cardiaca de la Mascota">
										<div v-if="errors.frecue_cardia" class="invalid-feedback">{{ errors.frecue_cardia }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fecing_hosp }">
										<label>Fecha de Ingreso</label>
										<input type="date"
											class="form-control"
											v-model="form.fecing_hosp"
											placeholder="Fecha de Ingreso">
										<div v-if="errors.fecing_hosp" class="invalid-feedback">{{ errors.fecing_hosp }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fecfin_hosp }">
										<label>Fecha de Salida</label>
										<input type="date"
											class="form-control"
											v-model="form.fecfin_hosp"
											placeholder="Fecha de Salida">
										<div v-if="errors.fecfin_hosp" class="invalid-feedback">{{ errors.fecfin_hosp }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.descrip_hosp }">
										<label>Observaciones</label>
										<textarea class="form-control" v-model="form.descrip_hosp" placeholder="Observaciones de la Mascota" rows="3"></textarea>
										<div v-if="errors.descrip_hosp" class="invalid-feedback">{{ errors.descrip_hosp }}</div>
									</div>
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8 col-12 actions text-end ms-auto">
									<Link :href="route('atenciones.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
				fecing_hosp: null,
				fecfin_hosp: null,
				estado_hosp: '',
				descrip_hosp: '',
				signologia: '',
				temp_corp: null,
				color_mucosa: '',
				palpa_abdominal: '',
				piel: '',
				frecue_cardia: '',
				id_masc: '',
			}),
		}
	},

	mounted(){
		
	},

	methods: {
		submit() {
            this.form.post(route('hospitalizaciones.store'), {
                onSuccess: () => this.form.reset(),
            });
        },
	}
}
</script>
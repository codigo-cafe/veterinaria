<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-10 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Registrar Atención</h5>
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
										:class="{ 'is-invalid': errors.tipo_aten }">
										<label for="tipo" class="ms-0">Tipo de Atención</label>
										<select v-model="form.tipo_aten" class="form-control" id="tipo">
											<option value="">Seleccione un Tipo de Atención</option>
											<option value="Peluqueria">Peluqueria</option>
											<option value="Baño">Baño</option>
											<option value="Cita Médica">Cita Médica</option>
											<option value="Vacunación">Vacunación</option>
										</select>
										<div v-if="errors.tipo_aten" class="invalid-feedback">{{ errors.tipo_aten }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.temp_aten }">
										<label>Temperatura</label>
										<input type="number"
											class="form-control"
											v-model="form.temp_aten"
											placeholder="Temperatura de la Mascota"
											autofocus>
										<div v-if="errors.temp_aten" class="invalid-feedback">{{ errors.temp_aten }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4 py-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.peso_aten }">
										<label>Peso</label>
										<input type="text"
											class="form-control"
											v-model="form.peso_aten"
											placeholder="Peso de la Mascota">
										<div v-if="errors.peso_aten" class="invalid-feedback">{{ errors.peso_aten }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.obtencion_masc }">
										<label>Obtención de la Mascota</label>
										<input type="text"
											class="form-control"
											v-model="form.obtencion_masc"
											placeholder="Obtención de la Mascota">
										<div v-if="errors.obtencion_masc" class="invalid-feedback">{{ errors.obtencion_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fech_aten }">
										<label>Fecha de Atención</label>
										<input type="date"
											class="form-control"
											v-model="form.fech_aten"
											placeholder="Fecha de Atención">
										<div v-if="errors.fech_aten" class="invalid-feedback">{{ errors.fech_aten }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.descrip_aten }">
										<label>Observaciones</label>
										<textarea class="form-control" v-model="form.descrip_aten" placeholder="Observaciones de la Mascota" rows="3"></textarea>
										<div v-if="errors.descrip_aten" class="invalid-feedback">{{ errors.descrip_aten }}</div>
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
				fech_aten: null,
				tipo_aten: '',
				peso_aten: null,
				temp_aten: null,
				descrip_aten: '',
				obtencion_masc: '',
				id_masc: '',
			}),
		}
	},

	mounted(){
		
	},

	methods: {
		submit() {
            this.form.post(route('atenciones.store'), {
                onSuccess: () => this.form.reset(),
            });
        },
	}
}
</script>
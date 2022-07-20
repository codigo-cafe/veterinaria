<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Editar Cita</h5>
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
										:class="{ 'is-invalid': errors.tipo_cita }">
										<label for="tipo" class="ms-0">Tipo de Cita</label>
										<select v-model="form.tipo_cita" class="form-control" id="tipo">
											<option value="">Seleccione un Tipo de Cita</option>
											<option value="Peluqueria">Peluqueria</option>
											<option value="Baño">Baño</option>
											<option value="Cita Médica">Cita Médica</option>
											<option value="Vacunación">Vacunación</option>
										</select>
										<div v-if="errors.tipo_cita" class="invalid-feedback">{{ errors.tipo_cita }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fec_cita }">
										<label>Fecha de Cita</label>
										<input type="date"
											class="form-control"
											v-model="form.fec_cita"
											placeholder="Fecha de Cita">
										<div v-if="errors.fec_cita" class="invalid-feedback">{{ errors.fec_cita }}</div>
									</div>
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8 col-12 actions text-end ms-auto">
									<Link :href="route('citas.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
		cita: Object,
		errors: Object
	},

	data() {
		return {
			form: useForm({
				tipo_cita: this.cita.tipo_cita,
				fec_cita: this.cita.fec_cita,
				id_masc: this.cita.id_masc,
			}),
		}
	},

	mounted(){
		
	},

	methods: {
		submit() {
            this.form.put(route('citas.update', this.cita.id_cita), {
                onSuccess: () => this.form.reset(),
            });
        },
	}
}
</script>
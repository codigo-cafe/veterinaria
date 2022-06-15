<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Editar Cliente</h5>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.cedula_clie }">
										<label>Cédula</label>
										<input type="text"
											class="form-control"
											v-model="form.cedula_clie"
											placeholder="Cédula de Identidad"
											autofocus>
										<div v-if="errors.cedula_clie" class="invalid-feedback">{{ errors.cedula_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.nom_clie }">
										<label>Nombre</label>
										<input type="text"
											class="form-control"
											v-model="form.nom_clie"
											placeholder="Nombre del Cliente">
										<div v-if="errors.nom_clie" class="invalid-feedback">{{ errors.nom_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.ape_clie }">
										<label>Apellidos</label>
										<input type="text"
											class="form-control"
											v-model="form.ape_clie"
											placeholder="Apellidos del Cliente">
										<div v-if="errors.ape_clie" class="invalid-feedback">{{ errors.apellidos_clie }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4 py-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.ocupacion_clie }">
										<label>Ocupación</label>
										<input type="text"
											class="form-control"
											v-model="form.ocupacion_clie"
											placeholder="Ocupación del Cliente">
										<div v-if="errors.ocupacion_clie" class="invalid-feedback">{{ errors.ocupacion_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.direccion_clie }">
										<label>Dirección</label>
										<input type="text"
											class="form-control"
											v-model="form.direccion_clie"
											placeholder="Dirección del Cliente">
										<div v-if="errors.direccion_clie" class="invalid-feedback">{{ errors.direccion_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.sexo_clie }">
										<label for="sexo" class="ms-0">Sexo</label>
										<select v-model="form.sexo_clie" class="form-control" id="sexo">
											<option value="">Seleccione un Sexo</option>
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
										</select>
										<div v-if="errors.sexo_clie" class="invalid-feedback">{{ errors.sexo_clie }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.edad_clie }">
										<label>Edad</label>
										<input type="number"
											class="form-control"
											v-model="form.edad_clie"
											placeholder="Edad del Cliente">
										<div v-if="errors.edad_clie" class="invalid-feedback">{{ errors.edad_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.correo_clie }">
										<label>Correo</label>
										<input type="email"
											class="form-control"
											v-model="form.correo_clie"
											placeholder="Correo Electrónico">
										<div v-if="errors.correo_clie" class="invalid-feedback">{{ errors.correo_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.celular_clie }">
										<label>Celular</label>
										<input type="text"
											class="form-control"
											v-model="form.celular_clie"
											placeholder="Número Telefónico">
										<div v-if="errors.celular_clie" class="invalid-feedback">{{ errors.celular_clie }}</div>
									</div>
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8 col-12 actions text-end ms-auto">
									<Link :href="route('clientes.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
		cliente: Object,
		errors: Object
	},

	data() {
		return {
			form: useForm({
				cedula_clie: this.cliente.cedula_clie,
				nom_clie: this.cliente.nom_clie,
				ape_clie: this.cliente.ape_clie,
				ocupacion_clie: this.cliente.ocupacion_clie,
				direccion_clie: this.cliente.direccion_clie,
				celular_clie: this.cliente.celular_clie,
				correo_clie: this.cliente.correo_clie,
				edad_clie: this.cliente.edad_clie,
				sexo_clie: this.cliente.sexo_clie,
			}),
		}
	},

	mounted(){
		
	},

	methods: {
		submit() {
            this.form.put(route('clientes.update', this.cliente.id_clie), {
                onSuccess: () => this.form.reset(),
            });
        },
	}
}
</script>
<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-10 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Registrar Examen</h5>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errores.titulo != '' }">
										<label>Título del Examen</label>
										<input type="text"
										class="form-control"
										v-model="titulo"
										placeholder="Título del Examen">
										<div v-if="errores.titulo != ''" class="invalid-feedback">{{ errores.titulo }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errores.descripcion != '' }">
										<label>Descripción del Examen</label>
										<input type="text"
										class="form-control"
										v-model="descripcion"
										placeholder="Descripción del Examen">
										<div v-if="errores.descripcion != ''" class="invalid-feedback">{{ errores.descripcion }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-outline d-block"
										:class="{ 'is-invalid': errores.imagen != '' }">
										<label>Imagen</label>
										<input type="file"
										class="form-control w-100"
										v-model="imagen"
										placeholder="Imagen del Examen"
										id="file">
										<div v-if="errores.imagen != ''" class="invalid-feedback">{{ errores.imagen }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.id_masc }">
										<label for="mascota" class="ms-0">Mascota</label>
										<select v-model="form.id_masc" class="form-control" id="mascota" required>
											<option value="">Seleccione una Mascota</option>
											<option :value="mascota.id_masc" v-for="mascota in mascotas" :key="mascota.id_masc">{{ mascota.nom_masc + " - " + mascota.cliente.nom_clie + " " + mascota.cliente.ape_clie }}</option>
										</select>
										<div v-if="errors.id_masc" class="invalid-feedback">{{ errors.id_masc }}</div>
									</div>
								</div>
							</div>

							<div class="row mt-4">
								<div class="col-lg-8 col-12 actions text-center mx-auto">
									<button type="button" class="btn btn-outline-dark mb-0" @click="restablecer">
										<i class="material-icons">refresh</i> Restablecer
									</button>
									<button type="button" class="btn bg-gradient-blue mb-0 ms-1" @click="agregar">
										<i class="material-icons">add</i> Añadir
									</button>
								</div>
								<div class="text-center mt-2 hide-msg" id="mensaje">
									<label class="text-success m-0">
										<i class="fas fa-check"></i> Examen añadido a su lista de examenes.
									</label>
								</div>
							</div>

							<div class="row mt-2">
								<div class="table-responsive">
									<table class="table align-items-center mb-4" id="datatable">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">#</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Título</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Imagen</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="(examen, index) in form.examenes" :key="examen.id_pro">
												<td class="text-sm font-weight-normal">{{ index }}</td>
												<td class="text-sm font-weight-normal">{{ examen.titulo }}</td>
												<td class="text-sm font-weight-normal">
													<div class="d-flex mt-4 pt-2">
														<figure>
															<img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" :src="examen.imagen" :alt="examen.titulo">
														</figure>
													</div>
												</td>
												<td class="text-sm font-weight-normal">{{ examen.descripcion }}</td>
												<td class="text-sm">
													<div class="d-flex justify-content-center align-items-center">
														<button type="button" @click="eliminar(examen)" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-md d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-original-title="Eliminar">
															<i class="material-icons text-lg">clear</i>
														</button>
													</div>
												</td>
											</tr>
											<tr v-if="form.examenes.length == 0">
												<td class="text-center py-3" colspan="100%">Aun no cuenta con examenes para realizar el registro.</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div v-if="errors.examenes" class="alert alert-warning alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> {{ errors.examenes }}</span>
										<button type="button" class="btn-close d-flex justify-content-center align-items-center" data-bs-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8 col-12 actions text-end ms-auto">
									<Link :href="route('examenes.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
				examenes: [],
				id_masc: '',
			}),
			examen_nuevo: {},
			titulo: '',
			descripcion: '',
			imagen: null,
			errores: {
				titulo: '',
				descripcion: '',
				imagen: '',
			},
		}
	},

	mounted(){

	},

	methods: {
		submit() {
            this.form.post(route('examenes.store'), {
                onSuccess: () => this.form.reset(),
            });
        },

        loadImg(file) {
			const reader = new FileReader();

			reader.readAsDataURL(file.files[0]);

			reader.onload = (e) => {
				Object.assign(this.examen_nuevo, {imagen: e.target.result});
			};
		},

        agregar() {
			let texto = document.getElementById('mensaje');
			this.imagen = document.getElementById("file");
        	if (this.titulo != '' && this.descripcion != '' && this.imagen.files.length != 0) {
				Object.assign(this.examen_nuevo, {titulo: this.titulo});
				Object.assign(this.examen_nuevo, {descripcion: this.descripcion});
				this.loadImg(this.imagen)
				this.form.examenes.push(this.examen_nuevo);

				this.errores.titulo = '';
				this.errores.descripcion = '';
				this.errores.imagen = '';
				texto.classList.remove('hide-msg');
        		texto.classList.add('show-msg');
        	} else {
        		if (this.titulo === '') {
        			this.errores.titulo = 'Por favor ingrese el título del examen';
        		} else {
        			this.errores.titulo = '';
        		}
        		if(this.descripcion === '') {
        			this.errores.descripcion = 'Por favor ingrese la descripción del examen';
        		} else {
        			this.errores.descripcion = '';
        		}
        		if(this.imagen.files.length === 0) {
        			this.errores.imagen = 'Por favor ingrese una imagen del examen';
        		} else {
        			this.errores.imagen = '';
        		}
        	}
        	setTimeout(() => {
        		texto.classList.remove('show-msg');
        		texto.classList.add('hide-msg');
				this.examen_nuevo = {};
				this.titulo = '';
				this.descripcion = '';
				document.getElementById('file').value = '';
        	}, 1000);
        },

        eliminar(examen) {
        	for( var i = 0; i < this.form.examenes.length; i++){
        		if ( this.form.examenes[i].titulo === examen.titulo) {
        			this.form.examenes.splice(i, 1);
        		}
        	}
        },

        restablecer() {
        	this.examen_nuevo = {};
        	this.titulo = '';
        	this.descripcion = '';
        	document.getElementById('file').value = '';
        }
	}
}
</script>
<template>
	<app-layout>
		<form role="form" @submit.prevent="submit" class="needs-validation">
			<div class="row mb-5 d-flex justify-content-center">
				<div class="col-lg-9 mt-lg-0 mt-4">
					<div class="card mt-4">
						<div class="card-header">
							<h5 class="mb-0">Editar Mascota</h5>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.id_clie }">
										<label for="cliente" class="ms-0">Dueño</label>
										<select v-model="form.id_clie" class="form-control" id="cliente" autofocus>
											<option value="">Seleccione un Dueño</option>
											<option :value="cliente.id_clie" v-for="cliente in clientes" :key="cliente.id_clie">{{ cliente.cedula_clie + " - " + cliente.nom_clie + " " + cliente.ape_clie}}</option>
										</select>
										<div v-if="errors.id_clie" class="invalid-feedback">{{ errors.id_clie }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.nom_masc }">
										<label>Nombre</label>
										<input type="text"
											class="form-control"
											v-model="form.nom_masc"
											placeholder="Nombre de la Mascota">
										<div v-if="errors.nom_masc" class="invalid-feedback">{{ errors.nom_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.raza_masc }">
										<label>Raza</label>
										<input type="text"
											class="form-control"
											v-model="form.raza_masc"
											placeholder="Raza de la Mascota">
										<div v-if="errors.raza_masc" class="invalid-feedback">{{ errors.raza_masc }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4 py-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.espe_masc }">
										<label>Especie</label>
										<input type="text"
											class="form-control"
											v-model="form.espe_masc"
											placeholder="Especie de la Mascota">
										<div v-if="errors.espe_masc" class="invalid-feedback">{{ errors.espe_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.sexo_masc }">
										<label for="sexo" class="ms-0">Sexo</label>
										<select v-model="form.sexo_masc" class="form-control" id="sexo">
											<option value="">Seleccione un Sexo</option>
											<option value="Macho">Macho</option>
											<option value="Hembra">Hembra</option>
										</select>
										<div v-if="errors.sexo_masc" class="invalid-feedback">{{ errors.sexo_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.peso_masc }">
										<label>Peso</label>
										<input type="text"
											class="form-control"
											v-model="form.peso_masc"
											placeholder="Peso de la Mascota">
										<div v-if="errors.peso_masc" class="invalid-feedback">{{ errors.peso_masc }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.color_masc }">
										<label>Color</label>
										<input type="text"
											class="form-control"
											v-model="form.color_masc"
											placeholder="Color de la Mascota">
										<div v-if="errors.color_masc" class="invalid-feedback">{{ errors.color_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.alimento_masc }">
										<label>Alimentación</label>
										<input type="text"
											class="form-control"
											v-model="form.alimento_masc"
											placeholder="Alimentación de la Mascota">
										<div v-if="errors.alimento_masc" class="invalid-feedback">{{ errors.alimento_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.vivienda_masc }">
										<label>Vivienda</label>
										<input type="text"
											class="form-control"
											v-model="form.vivienda_masc"
											placeholder="Vivienda de la Mascota">
										<div v-if="errors.vivienda_masc" class="invalid-feedback">{{ errors.vivienda_masc }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fecnac_masc }">
										<label>Fecha de Nacimiento</label>
										<input type="date"
											class="form-control"
											v-model="form.fecnac_masc"
											placeholder="Fecha de Nacimiento"
											:max="limitmax"
											@change="changedate">
										<div v-if="errors.fecnac_masc" class="invalid-feedback">{{ errors.fecnac_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.edad_masc }">
										<label>Edad</label>
										<input type="number"
											class="form-control"
											v-model="form.edad_masc"
											placeholder="Edad del Cliente">
										<div v-if="errors.edad_masc" class="invalid-feedback">{{ errors.edad_masc }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.pelaje_masc }">
										<label>Pelaje</label>
										<input type="text"
											class="form-control"
											v-model="form.pelaje_masc"
											placeholder="Pelaje de la Mascota">
										<div v-if="errors.pelaje_masc" class="invalid-feedback">{{ errors.pelaje_masc }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-12 mt-lg-0 mt-4">
					<div class="card mt-4">
						<div class="card-header">
							<h5 class="mb-0">Imágenes de la mascota</h5>
						</div>
						<div class="card-body pt-0">
							<label>Imágenes opcionales</label>
							<div class="input-group input-group-static d-block"
								:class="{ 'is-invalid': errors['imagenes_masc.0'] }">
								<file-pond
								name="test"
								ref="pond"
								class-name="my-pond"
								allow-multiple="true"
								accepted-file-types="image/jpeg, image/png"
								maxFileSize="5MB"
								v-bind:files="form.imagenes_masc"
								v-on:init="handleFilePondInit"/>
								<div v-if="errors['imagenes_masc.0']" class="invalid-feedback">
									{{ errors['imagenes_masc.0'] }}
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-12 col-12 actions text-end ms-auto">
									<Link :href="route('mascotas.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
									<button type="submit" class="btn bg-gradient-blue mb-0 ms-1" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Guardar</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</app-layout>
</template>
<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import moment from 'moment';

// Import FilePond
import vueFilePond, { setOptions } from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Create FilePond component
const FilePond = vueFilePond( FilePondPluginFileValidateType, FilePondPluginImagePreview, FilePondPluginFileValidateSize );

setOptions({
	labelIdle: 'Soltar imágenes aquí...',
});

export default {
	components: {
		AppLayout,
		Link,
		FilePond,
	},

	props: {
		clientes: Object,
		mascota: Object,
		errors: Object,
		imagenes_mascota: Array,
	},

	data() {
		return {
			form: useForm({
				_method: 'PUT',
				nom_masc: this.mascota.nom_masc,
				raza_masc: this.mascota.raza_masc,
				sexo_masc: this.mascota.sexo_masc,
				color_masc: this.mascota.color_masc,
				fecnac_masc: this.mascota.fecnac_masc,
				edad_masc: this.mascota.edad_masc,
				espe_masc: this.mascota.espe_masc,
				peso_masc: this.mascota.peso_masc,
				pelaje_masc: this.mascota.pelaje_masc,
				vivienda_masc: this.mascota.vivienda_masc,
				alimento_masc: this.mascota.alimento_masc,
				id_clie: this.mascota.id_clie,
				imagenes_masc: this.imagenes_mascota,
				imagenes_masc_recovered: [],
			}),
			limitmax: null,
		}
	},

	mounted(){
		this.limitmax = moment().format('YYYY-MM-DD');
	},

	methods: {
		submit() {
			this.form.imagenes_masc = [];
			const files = this.$refs.pond.getFiles();
			for ( var i in files) {
				if (files[i].file instanceof File) {
					console.log('file')
					this.form.imagenes_masc.push(files[i].file)
				} else {
					console.log('blog')
					this.form.imagenes_masc_recovered.push('/storage/'+files[i].file.name);
				}
			}
            this.form.post(route('mascotas.update', this.mascota.id_masc), {
                onSuccess: () => this.form.reset(),
            });
        },

		changedate() {
        	this.form.edad_masc = moment().diff(this.form.fecnac_masc, 'years');
        },

        handleFilePondInit: function() {
            this.$refs.pond.getFiles();
        },
	}
}
</script>
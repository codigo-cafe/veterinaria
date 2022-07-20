<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Editar Examen</h5>
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
										:class="{ 'is-invalid': errors.titu_exa }">
										<label>Título del Examen</label>
										<input type="text"
										class="form-control"
										v-model="form.titu_exa"
										placeholder="Título del Examen">
										<div v-if="errors.titu_exa" class="invalid-feedback">{{ errors.titu_exa }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.descrip_exa }">
										<label>Descripción del Examen</label>
										<input type="text"
										class="form-control"
										v-model="form.descrip_exa"
										placeholder="Descripción del Examen">
										<div v-if="errors.descrip_exa" class="invalid-feedback">{{ errors.descrip_exa }}</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 py-4">
									<div class="input-group input-group-static d-block"
									:class="{ 'is-invalid': errors.img_exa }">
									<label class="pb-1">Imágen del Examen</label>
									<file-pond
									name="test"
									ref="pond"
									class-name="my-pond"
									accepted-file-types="image/jpeg, image/png"
									maxFileSize="5MB"
									v-bind:files="form.img_exa_recovered"
									v-on:init="handleFilePondInit"/>
										<div v-if="errors.img_exa" class="invalid-feedback">
											{{ errors.img_exa }}
										</div>
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
	labelIdle: 'Soltar imagen aquí...',
});

export default {
	components: {
		AppLayout,
		Link,
		FilePond,
	},

	props: {
		mascotas: Object,
		examen: Object,
		errors: Object
	},

	data() {
		return {
			form: useForm({
				_method: 'PUT',
				titu_exa: this.examen.titu_exa,
				img_exa: this.examen.img_exa,
				img_exa_recovered: this.examen.img_exa,
				descrip_exa: this.examen.descrip_exa,
				id_masc: this.examen.id_masc,
			}),
		}
	},

	mounted(){
		
	},

	methods: {
		submit() {
			if (this.$refs.pond.getFiles()[0] != undefined) {
				if (this.$refs.pond.getFiles()[0].file instanceof File) {
					this.form.img_exa = this.$refs.pond.getFiles()[0].file;
				}
			}
            this.form.post(route('examenes.update', this.examen.id_exa), {
                onSuccess: () => this.form.reset(),
            });
        },

        handleFilePondInit: function() {
            this.$refs.pond.getFiles();
        },
	}
}
</script>
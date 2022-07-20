<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Editar Tratamiento</h5>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-static"
									:class="{ 'is-invalid': mensaje }">
										<label for="producto" class="ms-0">Producto</label>
										<select v-model="id_pro" class="form-control" id="producto" @change="changeproducto">
											<option value="">Seleccione un Producto</option>
											<option :value="producto.id_pro" v-for="producto in productos" :key="producto.id_pro">{{ producto.nom_pro + " - " + producto.cantidad_pro + " " + "unidades" }}</option>
										</select>
										<div v-if="mensaje" class="invalid-feedback">{{ mensaje }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static">
										<label>Dosis</label>
										<input type="number"
										min="1"
										class="form-control"
										v-model="dosis"
										placeholder="Dosis del Producto"
										required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static">
										<label>Tiempo</label>
										<input type="text"
										class="form-control"
										v-model="tiempo"
										placeholder="Tiempo de aplicación del Producto"
										required>
									</div>
								</div>
							</div>

							<div class="row mt-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fec_ini }">
										<label>Fecha de Inicio</label>
										<input type="date"
											class="form-control"
											:min="limitmin"
											v-model="fec_ini"
											placeholder="Fecha de Inicio">
										<div v-if="errors.fec_ini" class="invalid-feedback">{{ errors.fec_ini }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fec_fin }">
										<label>Fecha de Finalización</label>
										<input type="date"
											class="form-control"
											:min="limitmin"
											v-model="fec_fin"
											placeholder="Fecha de Finalización">
										<div v-if="errors.fec_fin" class="invalid-feedback">{{ errors.fec_fin }}</div>
									</div>
								</div>
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
										<i class="fas fa-check"></i> Producto añadido al tratamiento.
									</label>
								</div>
							</div>

							<div class="row mt-2">
								<div class="table-responsive">
									<table class="table align-items-center mb-4" id="datatable">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre Producto</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dosis</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiempo</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Inicio</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Finalización</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="producto in form.productos" :key="producto.id_pro">
												<td class="text-sm font-weight-normal">{{ producto.id_pro }}</td>
												<td class="text-sm font-weight-normal">{{ producto.nom_pro }}</td>
												<td class="text-sm font-weight-normal">{{ producto.dosis }}</td>
												<td class="text-sm font-weight-normal">{{ producto.tiempo }}</td>
												<td class="text-sm font-weight-normal">{{ producto.fec_ini }}</td>
												<td class="text-sm font-weight-normal">{{ producto.fec_fin }}</td>
												<td class="text-sm">
													<div class="d-flex justify-content-center align-items-center">
														<button type="button" @click="eliminar(producto.id_pro)" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-md d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-original-title="Eliminar">
															<i class="material-icons text-lg">clear</i>
														</button>
													</div>
												</td>
											</tr>
											<tr v-if="form.productos.length == 0">
												<td class="text-center py-3" colspan="100%">Aun no cuenta con productos para realizar el registro del tratamiento.</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div v-if="errors.productos" class="alert alert-warning alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> {{ errors.productos }}</span>
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
									<Link :href="route('tratamientos.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
import moment from 'moment';

export default {
	components: {
		AppLayout,
		Link,
	},

	props: {
		mascotas: Object,
		productos: Object,
		tratamiento: Object,
		errors: Object
	},

	data() {
		return {
			form: useForm({
				productos: [],
				id_masc: this.tratamiento.id_masc,
			}),
			id_pro: '',
			producto_nuevo: null,
			dosis: 1,
			tiempo: 'Cada hora',
			fec_ini: moment().format('YYYY-MM-DD'),
			fec_fin: moment().format('YYYY-MM-DD'),
			mensaje: '',
			limitmin: null,
		}
	},

	mounted(){
		this.limitmin = moment().format('YYYY-MM-DD');
		this.updateProductos();
	},

	methods: {
		submit() {
            this.form.put(route('tratamientos.update', this.tratamiento.id_tra), {
                onSuccess: () => this.form.reset(),
            });
        },

        updateProductos() {
        	this.tratamiento.productos.map((producto) => {
        		var prod = {};
        		Object.assign(prod, {id_pro: producto.id_pro});
        		Object.assign(prod, {nom_pro: producto.nom_pro});
        		Object.assign(prod, {id_tra: this.tratamiento.id_tra});
        		Object.assign(prod, {dosis: producto.pivot.dosis_tra});
				Object.assign(prod, {tiempo: producto.pivot.tiempo_tra});
				Object.assign(prod, {fec_ini: moment(producto.pivot.fecing_tra).format('DD/MM/YYYY')});
				Object.assign(prod, {fec_fin: moment(producto.pivot.fecfin_tra).format('DD/MM/YYYY')});
				this.form.productos.push(prod);
        	});
        },

        changeproducto() {
        	this.dosis = '';
        	this.producto_nuevo = this.productos.find((producto_nuevo) => {
        		return producto_nuevo.id_pro === this.id_pro;
        	});

        	if (this.producto_nuevo) {
        		this.dosis = 1;
        		this.tiempo = 'Cada hora';
        		this.mensaje = '';
        	} else {
        		this.max = 1;
        		this.mensaje = "Por favor seleccione un producto";
        	}
        },

        agregar() {
			let texto = document.getElementById('mensaje');
        	if (this.producto_nuevo) {
				let producto_guardado = this.form.productos.find((producto_guardado) => {
					return producto_guardado.id_pro === this.producto_nuevo.id_pro;
				});

				if (!producto_guardado) {
					Object.assign(this.producto_nuevo, {dosis: this.dosis});
					Object.assign(this.producto_nuevo, {tiempo: this.tiempo});
					Object.assign(this.producto_nuevo, {fec_ini: moment(this.fec_ini).format('DD/MM/YYYY')});
					Object.assign(this.producto_nuevo, {fec_fin: moment(this.fec_fin).format('DD/MM/YYYY')});
					this.form.productos.push(this.producto_nuevo);
				} else{
					this.form.productos.find((producto_guardado) => {
						if (producto_guardado.id_pro === this.producto_nuevo.id_pro) {
							producto_guardado.dosis = producto_guardado.dosis + this.dosis;
						}
					});
				}
				this.mensaje = '';
				texto.classList.remove('hide-msg');
        		texto.classList.add('show-msg');
        	} else {
        		this.mensaje = "Por favor seleccione un producto";
        	}
        	setTimeout(() => {
        		texto.classList.remove('show-msg');
        		texto.classList.add('hide-msg');
        	}, 1000)
        },

        eliminar(id_pro) {
        	for( var i = 0; i < this.form.productos.length; i++){
        		if ( this.form.productos[i].id_pro === id_pro) {
        			this.form.productos.splice(i, 1);
        		}
        	}
        },

        restablecer() {
        	this.id_pro = '';
			this.producto_nuevo = null;
			this.dosis = 1;
			this.tiempo = 'Cada hora';
			this.mensaje = '';
        }
	}
}
</script>
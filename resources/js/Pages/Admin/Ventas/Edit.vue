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
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-6">
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
										<div class="col-md-6">
											<div class="input-group input-group-static">
												<label>Cantidad</label>
												<input type="number"
												min="1"
												:max="max"
												class="form-control"
												v-model="cantidad"
												placeholder="Cantidad del Producto"
												@change="changecantidad"
												required>
											</div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="col-md-6">
											<div class="input-group input-group-static"
											:class="{ 'is-invalid': errors.id_clie }">
												<label for="cliente" class="ms-0">Cliente</label>
												<select v-model="form.id_clie" class="form-control" id="cliente">
													<option value="">Seleccione un Cliente</option>
													<option :value="cliente.id_clie" v-for="cliente in clientes" :key="cliente.id_clie">{{ cliente.cedula_clie + " - " + cliente.nom_clie + " " + cliente.ape_clie}}</option>
												</select>
												<div v-if="errors.id_clie" class="invalid-feedback">{{ errors.id_clie }}</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static d-block">
										<label>Precio Unitario del Producto</label>
										<div class="font-weight-bold text-dark">
											<h4 class="font-weight-bold">{{ precio_pro }} COP</h4>
										</div>
									</div>
									<div class="input-group input-group-static d-block">
										<label>Subtotal</label>
										<div class="font-weight-bold text-dark">
											<h4 class="font-weight-bold">{{ subtotal }} COP</h4>
										</div>
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
										<i class="fas fa-check"></i> Producto añadido a su lista de productos.
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
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cantidad</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Precio Unitario</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Precio Total</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="producto in form.productos" :key="producto.id_pro">
												<td class="text-sm font-weight-normal">{{ producto.id_pro }}</td>
												<td class="text-sm font-weight-normal">{{ producto.nom_pro }}</td>
												<td class="text-sm font-weight-normal">{{ producto.cantidad }}</td>
												<td class="text-sm font-weight-normal">{{ producto.precio_pro }}</td>
												<td class="text-sm font-weight-normal">{{ producto.total }}</td>
												<td class="text-sm">
													<div class="d-flex justify-content-center align-items-center">
														<button type="button" @click="eliminar(producto.id_pro)" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-md d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-original-title="Eliminar">
															<i class="material-icons text-lg">clear</i>
														</button>
													</div>
												</td>
											</tr>
											<tr v-if="form.productos.length == 0">
												<td class="text-center py-3" colspan="100%">Aun no cuenta con productos para realizar la venta.</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="4" class="text-sm font-weight-bolder text-end">Total</td>
												<td class="text-sm">
													{{ form.total_ven }} COP
												</td>
											</tr>
										</tfoot>
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
									<Link :href="route('ventas.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
		clientes: Object,
		productos: Object,
		venta: Object,
		errors: Object
	},

	data() {
		return {
			form: useForm({
				productos: [],
				id_clie: this.venta.id_clie,
				total_ven: Number(this.venta.total_ven).toFixed(2),
			}),
			id_pro: '',
			producto_nuevo: null,
			cantidad: 1,
			max: 1,
			precio_pro: Number(0.00).toFixed(2),
			subtotal: Number(0.00).toFixed(2),
			mensaje: '',
		}
	},

	mounted(){
		this.updateProductos();
	},

	methods: {
		submit() {
            this.form.put(route('ventas.update', this.venta.id_ven), {
                onSuccess: () => this.form.reset(),
            });
        },

        updateProductos() {
        	this.venta.productos.map((producto) => {
        		var prod = {};
        		Object.assign(prod, {id_pro: producto.id_pro});
        		Object.assign(prod, {nom_pro: producto.nom_pro});
        		Object.assign(prod, {id_ven: this.venta.id_ven});
        		Object.assign(prod, {cantidad: producto.pivot.cant_ven});
				Object.assign(prod, {precio_pro: producto.pivot.precio_pro});
				Object.assign(prod, {total: Number(producto.pivot.cant_ven * producto.pivot.precio_pro).toFixed(2)});
				this.form.productos.push(prod);
        	});
        },

        changeproducto() {
        	this.cantidad = 1;
        	this.producto_nuevo = this.productos.find((producto_nuevo) => {
        		return producto_nuevo.id_pro === this.id_pro;
        	});

        	if (this.producto_nuevo) {
        		this.max = this.producto_nuevo.cantidad_pro;
        		this.precio_pro = Number(this.producto_nuevo.precio_pro).toFixed(2);
        		this.subtotal = Number(this.cantidad * this.producto_nuevo.precio_pro).toFixed(2);
        		this.mensaje = '';
        	} else {
        		this.max = 1;
        		this.precio_pro = Number(0.00).toFixed(2);
        		this.subtotal = Number(0.00).toFixed(2);
        		this.mensaje = "Por favor seleccione un producto";
        	}
        },

        changecantidad() {
        	if (this.producto_nuevo) {
        		this.subtotal = Number(this.cantidad * this.producto_nuevo.precio_pro).toFixed(2);
        	} else {
        		this.subtotal = Number(0.00).toFixed(2);
        	}
        },

        agregar() {
			let texto = document.getElementById('mensaje');
        	if (this.producto_nuevo) {
				let producto_guardado = this.form.productos.find((producto_guardado) => {
					return producto_guardado.id_pro === this.producto_nuevo.id_pro;
				});

				if (!producto_guardado) {
					Object.assign(this.producto_nuevo, {cantidad: this.cantidad});
					Object.assign(this.producto_nuevo, {total: this.subtotal});
					this.form.productos.push(this.producto_nuevo);
				} else{
					this.form.productos.find((producto_guardado) => {
						if (producto_guardado.id_pro === this.producto_nuevo.id_pro) {
							producto_guardado.cantidad = producto_guardado.cantidad + this.cantidad;
							producto_guardado.total = Number(parseFloat(producto_guardado.total) + parseFloat(this.subtotal)).toFixed(2);
						}
					});
				}
				this.mensaje = '';
				this.form.total_ven = Number(Object.values(this.form.productos).reduce((acc, {cantidad, precio_pro}) => acc + cantidad * precio_pro, 0)).toFixed(2);
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
        	this.form.total_ven = Number(Object.values(this.form.productos).reduce((acc, {cantidad, precio_pro}) => acc + cantidad * precio_pro, 0)).toFixed(2);
        },

        restablecer() {
        	this.id_pro = '';
			this.producto_nuevo = null;
			this.cantidad = 1;
			this.max = 1;
			this.precio_pro = Number(0.00).toFixed(2);
			this.subtotal = Number(0.00).toFixed(2);
			this.mensaje = '';
        }
	}
}
</script>
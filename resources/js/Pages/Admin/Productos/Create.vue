<template>
	<app-layout>
		<div class="row mb-5 d-flex justify-content-center">
			<div class="col-lg-10 mt-lg-0 mt-4">
				<div class="card mt-4">
					<form role="form" @submit.prevent="submit" class="needs-validation">
						<div class="card-header">
							<h5 class="mb-0">Registrar Producto</h5>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.numserie_pro }">
										<label>Número de Serie</label>
										<input type="text"
											class="form-control"
											v-model="form.numserie_pro"
											placeholder="Número de Serie del Producto"
											autofocus>
										<div v-if="errors.numserie_pro" class="invalid-feedback">{{ errors.numserie_pro }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.nom_pro }">
										<label>Nombre</label>
										<input type="text"
											class="form-control"
											v-model="form.nom_pro"
											placeholder="Nombre del Producto">
										<div v-if="errors.nom_pro" class="invalid-feedback">{{ errors.nom_pro }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.fecven_pro }">
										<label>Fecha de Vencimiento</label>
										<input type="date"
											class="form-control"
											v-model="form.fecven_pro"
											placeholder="Fecha de Vencimiento">
										<div v-if="errors.fecven_pro" class="invalid-feedback">{{ errors.fecven_pro }}</div>
									</div>
								</div>
							</div>
							<div class="row mt-4 py-4">
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.cantidad_pro }">
										<label>Cantidad</label>
										<input type="number"
											class="form-control"
											v-model="form.cantidad_pro"
											placeholder="Cantidad de Unidades">
										<div v-if="errors.cantidad_pro" class="invalid-feedback">{{ errors.cantidad_pro }}</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="input-group input-group-static"
										:class="{ 'is-invalid': errors.precio_pro }">
										<label>Valor Unitario</label>
										<input type="text"
											class="form-control"
											v-model="form.precio_pro"
											placeholder="Valor Unitario del Producto">
										<div v-if="errors.precio_pro" class="invalid-feedback">{{ errors.precio_pro }}</div>
									</div>
								</div>
							</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer">
							<div class="row">
								<div class="col-lg-8 col-12 actions text-end ms-auto">
									<Link :href="route('productos.index')" class="btn btn-outline-dark mb-0">Cancelar</Link>
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
				numserie_pro: '',
				nom_pro: '',
				fecven_pro: '',
				cantidad_pro: null,
				precio_pro: null,
			}),
		}
	},

	mounted(){
		
	},

	methods: {
		submit() {
            this.form.post(route('productos.store'), {
                onSuccess: () => this.form.reset(),
            });
        },
	}
}
</script>
<template>
	<app-layout>
		<div class="row mb-5">
			<div class="col-lg-3">
				<div class="card position-sticky top-1">
					<ul class="nav flex-column bg-white border-radius-lg p-3">
						<li class="nav-item">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#informacion">
								<i class="material-icons text-lg me-2">content_paste</i>
								<span class="text-sm">Información</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#vencimiento">
								<i class="material-icons text-lg me-2">event</i>
								<span class="text-sm">Fecha de Vencimiento</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card" id="informacion">
					<div class="card-header">
						<h5 class="mb-0">Información</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Número de Serie</label>
									<input type="text" class="form-control" :value="producto.numserie_pro" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Nombre</label>
									<input type="text" class="form-control" :value="producto.nom_pro" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Cantidad</label>
									<input type="text" class="form-control" :value="producto.cantidad_pro" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Valor Unitario</label>
									<input type="text" class="form-control" :value="producto.precio_pro" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="vencimiento">
					<div class="card-header d-flex">
						<h5 class="mb-0">Fecha de Vencimiento</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Fecha de Vencimiento del Producto</label>
									<input type="text" class="form-control" :value="fecven_pro" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-lg-8 col-12 actions text-end ms-auto">
								<Link :href="route('productos.index')" class="btn btn-outline-dark mb-0">Volver</Link>
								<Link :href="route('productos.edit', producto.id_pro)" class="btn bg-gradient-blue mb-0 ms-1">Editar</Link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</app-layout>
</template>
<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout';
import { Link } from '@inertiajs/inertia-vue3';
import moment from 'moment';

export default {
	components: {
		AppLayout,
		Link,
	},
	props: {
		'producto': Object
	},

	data() {
		return {
			fecven_pro: moment(this.producto.fecven_pro).format('DD/MM/YYYY'),
		}
	}
}
</script>
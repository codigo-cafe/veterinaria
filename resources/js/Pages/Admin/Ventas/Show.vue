<template>
	<app-layout>
		<div class="row mb-5">
			<div class="col-lg-9 mt-lg-0 mt-4 mx-auto">
				<div class="card card-body" id="perfil">
					<div class="row justify-content-center align-items-center">
						<div class="col-sm-auto col-4">
							<div class="avatar avatar-xl position-relative">
								<img src="/img/logo.png" alt="cliente" class="w-100 rounded-circle shadow-sm">
							</div>
						</div>
						<div class="col-sm-auto col-8 my-auto">
							<div class="h-100">
								<h5 class="mb-1 font-weight-bolder">
									Veterinaria
								</h5>
								<p class="mb-0 font-weight-normal text-sm">
									{{ $page.props.user.correo_per }}
								</p>
							</div>
						</div>
						<div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
							<span class="badge badge-success ms-auto mb-auto">{{ $page.props.user.cargo_per }}</span>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="ocupacion">
					<div class="card-header d-block">
						<h5 class="mb-0">Recibo de Venta</h5>
						<p class="text-sm my-2 text-dark">venta realizada el {{ fecha(venta.fec_ven) }}</p>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="d-flex">
									<div>
										<img :src="venta.cliente.sexo_clie === 'Masculino' ? '/img/man.png' : '/img/woman.png'" class="avatar avatar-xxl me-3" alt="product image">
									</div>
									<div>
										<h6 class="text-lg mb-0 mt-2">Datos del Cliente</h6>
										<p class="text-sm my-2"> <strong>Cliente: </strong> {{ venta.cliente.nom_clie + ' ' + venta.cliente.ape_clie }}</p>
										<p class="text-sm my-2"> <strong>Dirección: </strong> {{ venta.cliente.direccion_clie }}</p>
										<span class="badge badge-sm bg-gradient-success">{{ venta.cliente.ocupacion_clie }}</span>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12 my-auto text-end">
								<h6 class="text-lg mb-0 mt-2">Detalles</h6>
								<p class="text-sm my-2"> <strong>Cédula: </strong> {{ venta.cliente.cedula_clie }}</p>
								<p class="text-sm my-2"> <strong>Correo: </strong> {{ venta.cliente.correo_clie }}</p>
								<p class="text-sm my-2"> <strong>Celular: </strong> {{ venta.cliente.celular_clie }}</p>
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
										</tr>
									</thead>
									<tbody>
										<tr v-for="producto in venta.productos" :key="producto.id_pro">
											<td class="text-sm font-weight-normal">{{ producto.id_pro }}</td>
											<td class="text-sm font-weight-normal">{{ producto.nom_pro }}</td>
											<td class="text-sm font-weight-normal">{{ producto.pivot.cant_ven }}</td>
											<td class="text-sm font-weight-normal">{{ producto.pivot.precio_pro }}</td>
											<td class="text-sm font-weight-normal">{{ decimales(producto.pivot.cant_ven * producto.pivot.precio_pro) }}</td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4" class="text-sm font-weight-bolder text-end">Total</td>
											<td class="text-sm">
												{{ venta.total_ven }} COP
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-lg-8 col-12 actions text-end ms-auto">
								<Link :href="route('ventas.index')" class="btn btn-outline-dark mb-0">Volver</Link>
								<Link :href="route('ventas.edit', venta.id_ven)" class="btn bg-gradient-blue mb-0 ms-1">Editar</Link>
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
		'venta': Object
	},

	methods: {
		fecha: function (date) {
			if (date) {
				return moment(date).format('DD/MM/YYYY');
			} else {
				return '';
			}
		},

		decimales: function (total) {
			if (total) {
				return Number(total).toFixed(2);
			} else {
				return '';
			}
		},
	}
}
</script>
<template>
	<app-layout>
		<div class="row mb-5">
			<div class="col-lg-3">
				<div class="card position-sticky top-1">
					<ul class="nav flex-column bg-white border-radius-lg p-3">
						<li class="nav-item">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#tratamiento">
								<i class="fas fa-capsules me-2"></i>
								<span class="text-sm">Tratamiento</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#mascota">
								<i class="material-icons text-lg me-2">pets</i>
								<span class="text-sm">Mascota</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#dueno">
								<i class="material-icons text-lg me-2">person</i>
								<span class="text-sm">Dueño</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#direccion">
								<i class="material-icons text-lg me-2">location_on</i>
								<span class="text-sm">Dirección</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#contacto">
								<i class="material-icons text-lg me-2">phone</i>
								<span class="text-sm">Contacto</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#imagenes">
								<i class="material-icons text-lg me-2">collections</i>
								<span class="text-sm">Imágenes</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card card-body" id="tratamiento">
					<div class="card-header">
						<h5 class="mb-0">Tratamiento</h5>
					</div>
					<div class="card-body pt-0">
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
										</tr>
									</thead>
									<tbody>
										<tr v-for="producto in tratamiento.productos" :key="producto.id_pro">
											<td class="text-sm font-weight-normal">{{ producto.id_pro }}</td>
											<td class="text-sm font-weight-normal">{{ producto.nom_pro }}</td>
											<td class="text-sm font-weight-normal">{{ producto.pivot.dosis_tra }}</td>
											<td class="text-sm font-weight-normal">{{ producto.pivot.tiempo_tra }}</td>
											<td class="text-sm font-weight-normal">{{ fecha(producto.pivot.fecing_tra) }}</td>
											<td class="text-sm font-weight-normal">{{ fecha(producto.pivot.fecfin_tra) }}</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="card card-body mt-4" id="mascota">
					<div class="row justify-content-center align-items-center">
						<div class="col-sm-auto col-4">
							<div class="avatar avatar-xl position-relative">
								<img :src="tratamiento.mascota.cliente.sexo_masc === 'Masculino' ? '/img/man.png' : '/img/woman.png'" alt="bruce" class="w-100 rounded-circle shadow-sm">
							</div>
						</div>
						<div class="col-sm-auto col-8 my-auto">
							<div class="h-100">
								<h5 class="mb-1 font-weight-bolder">
									{{ tratamiento.mascota.cliente.nom_clie }} {{ tratamiento.mascota.cliente.ape_clie }}
								</h5>
								<p class="mb-0 font-weight-normal text-sm">
									{{ tratamiento.mascota.cliente.correo_clie }}
								</p>
							</div>
						</div>
						<div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
							<span class="badge badge-success ms-auto mb-auto">Estado</span>
						</div>
					</div>
				</div>

				<div class="card mt-4">
					<div class="card-header">
						<h5 class="mb-0">Mascota</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Nombre</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.nom_masc" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Raza</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.raza_masc" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Especie</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.espe_masc" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Color</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.color_masc" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Pelaje</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.pelaje_masc" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Sexo</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.sexo_masc" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Fecha de Nacimiento</label>
									<input type="text" class="form-control" :value="fecnac_masc" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Edad</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.edad_masc + ' años' " disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="dueno">
					<div class="card-header">
						<h5 class="mb-0">Dueño</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Nombre</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.nom_clie" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Apellidos</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.ape_clie" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Cédula</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.cedula_clie" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Ocupación</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.ocupacion_clie" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Edad</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.edad_clie + ' años'" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Sexo</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.sexo_clie" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="direccion">
					<div class="card-header">
						<h5 class="mb-0">Dirección</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-12">
								<div class="input-group input-group-static">
									<label>Vivienda</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.vivienda_masc" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="contacto">
					<div class="card-header">
						<h5 class="mb-0">Contacto</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Celular</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.celular_clie" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Correo Electrónico</label>
									<input type="text" class="form-control" :value="tratamiento.mascota.cliente.correo_clie" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="imagenes">
					<div class="card-header d-flex">
						<h5 class="mb-0">Imágenes</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row d-flex justify-content-center">
							<div class="col-md-12">
								<div v-if="tratamiento.mascota.imagenes.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
									<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
									<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con imágenes.</span>
									<button type="button" class="btn-close d-flex justify-content-center align-items-center" data-bs-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
							<div class="col-md-9">
								<div id="carouselImagenesMascota" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-indicators">
										<button type="button" data-bs-target="#carouselImagenesMascota" :data-bs-slide-to="index" :class="{ 'active' : index === 0 }" :aria-current="{ true : index === 0 }" aria-label="Imagen" v-for="(imagen, index) in tratamiento.mascota.imagenes" :key="imagen.id_img"></button>
									</div>
									<div class="carousel-inner">
										<div class="carousel-item" :class="{ 'active' : index === 0 }" v-for="(imagen, index) in tratamiento.mascota.imagenes" :key="imagen.id_img">
											<img :src="imagen.url_img" class="d-block w-100 carousel-cover" alt="tratamiento.mascota.nom_masc">
										</div>
									</div>
									<button class="carousel-control-prev" type="button" data-bs-target="#carouselImagenesMascota" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Anterior</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselImagenesMascota" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Siguiente</span>
									</button>
								</div>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-lg-12 col-12 actions text-end ms-auto">
								<Link :href="route('tratamientos.index')" class="btn btn-outline-dark mb-0">Volver</Link>
								<Link :href="route('tratamientos.edit', tratamiento.id_tra)" class="btn bg-gradient-blue mb-0 ms-1">Editar</Link>
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
		'tratamiento': Object
	},

	data() {
		return {
			fecnac_masc: moment(this.tratamiento.mascota.fecnac_masc).format('DD/MM/YYYY'),
		}
	},

	methods: {
		fecha: function (date) {
			if (date) {
				return moment(date).format('DD/MM/YYYY');
			} else {
				return '';
			}
		},
	}
}
</script>
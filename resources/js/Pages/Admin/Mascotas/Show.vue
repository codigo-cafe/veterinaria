<template>
	<app-layout>
		<div class="row mb-5">
			<div class="col-lg-3">
				<div class="card position-sticky top-1">
					<ul class="nav flex-column bg-white border-radius-lg p-3">
						<li class="nav-item">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#mascota">
								<i class="material-icons text-lg me-2">person</i>
								<span class="text-sm">Mascota</span>
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
							<a class="nav-link text-dark d-flex" data-scroll="" href="#ocupacion">
								<i class="material-icons text-lg me-2">workspace_premium</i>
								<span class="text-sm">Ocupación</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card card-body" id="mascota">
					<div class="row justify-content-center align-items-center">
						<div class="col-sm-auto col-4">
							<div class="avatar avatar-xl position-relative">
								<img :src="mascota.cliente.sexo_masc === 'Masculino' ? '/img/man.png' : '/img/woman.png'" alt="bruce" class="w-100 rounded-circle shadow-sm">
							</div>
						</div>
						<div class="col-sm-auto col-8 my-auto">
							<div class="h-100">
								<h5 class="mb-1 font-weight-bolder">
									{{ mascota.cliente.nom_clie }} {{ mascota.cliente.ape_clie }}
								</h5>
								<p class="mb-0 font-weight-normal text-sm">
									{{ mascota.cliente.correo_clie }}
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
									<input type="text" class="form-control" :value="mascota.nom_masc" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Raza</label>
									<input type="text" class="form-control" :value="mascota.raza_masc" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Especie</label>
									<input type="text" class="form-control" :value="mascota.espe_masc" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Color</label>
									<input type="text" class="form-control" :value="mascota.color_masc" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Edad</label>
									<input type="text" class="form-control" :value="mascota.edad_masc + ' años' " disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Sexo</label>
									<input type="text" class="form-control" :value="mascota.sexo_masc" disabled>
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
									<input type="text" class="form-control" :value="mascota.vivienda_masc" disabled>
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
									<input type="text" class="form-control" :value="mascota.cliente.celular_clie" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Correo Electrónico</label>
									<input type="text" class="form-control" :value="mascota.cliente.correo_clie" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="ocupacion">
					<div class="card-header d-flex">
						<h5 class="mb-0">Pelaje</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-md-6">
								<div class="input-group input-group-static">
									<label>Pelaje</label>
									<input type="text" class="form-control" :value="mascota.pelaje_masc" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-lg-8 col-12 actions text-end ms-auto">
								<Link :href="route('mascotas.index')" class="btn btn-outline-dark mb-0">Volver</Link>
								<Link :href="route('mascotas.edit', mascota.id_masc)" class="btn bg-gradient-blue mb-0 ms-1">Editar</Link>
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

export default {
	components: {
		AppLayout,
		Link,
	},
	props: {
		'mascota': Object
	},
}
</script>
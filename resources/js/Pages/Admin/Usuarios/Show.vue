<template>
	<app-layout>
		<div class="row mb-5">
			<div class="col-lg-3">
				<div class="card position-sticky top-1">
					<ul class="nav flex-column bg-white border-radius-lg p-3">
						<li class="nav-item">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#perfil">
								<i class="material-icons text-lg me-2">person</i>
								<span class="text-sm">Perfil</span>
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
							<a class="nav-link text-dark d-flex" data-scroll="" href="#contrato">
								<i class="material-icons text-lg me-2">work</i>
								<span class="text-sm">Contrato</span>
							</a>
						</li>
						<li class="nav-item pt-2">
							<a class="nav-link text-dark d-flex" data-scroll="" href="#profesion">
								<i class="material-icons text-lg me-2">workspace_premium</i>
								<span class="text-sm">Profesión</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-9 mt-lg-0 mt-4">
				<div class="card card-body" id="perfil">
					<div class="row justify-content-center align-items-center">
						<div class="col-sm-auto col-4">
							<div class="avatar avatar-xl position-relative">
								<img :src="usuario.profile_photo_url" alt="bruce" class="w-100 rounded-circle shadow-sm">
							</div>
						</div>
						<div class="col-sm-auto col-8 my-auto">
							<div class="h-100">
								<h5 class="mb-1 font-weight-bolder">
									{{ usuario.nom_per }} {{ usuario.ape_per }}
								</h5>
								<p class="mb-0 font-weight-normal text-sm">
									{{ usuario.correo_per }}
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
						<h5 class="mb-0">Perfil</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Nombre</label>
									<input type="text" class="form-control" :value="usuario.nom_per" disabled>
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Apellidos</label>
									<input type="text" class="form-control" :value="usuario.ape_per" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Cédula</label>
									<input type="text" class="form-control" :value="usuario.cedula_per" disabled>
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Fecha de Nacimiento</label>
									<input type="email" class="form-control" :value="usuario.fecnac_per" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Edad</label>
									<input type="email" class="form-control" :value="usuario.edad_per" disabled>
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Sexo</label>
									<input type="text" class="form-control" :value="usuario.sexo_per" disabled>
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
									<label>Dirección</label>
									<input type="text" class="form-control" :value="usuario.dir_per" disabled>
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
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Celular</label>
									<input type="text" class="form-control" :value="usuario.celular_per" disabled>
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Correo Electrónico</label>
									<input type="text" class="form-control" :value="usuario.correo_per" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="contrato">
					<div class="card-header">
						<h5 class="mb-0">Contrato</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Fecha de Ingreso</label>
									<input type="text" class="form-control" :value="usuario.fecinicio_per" disabled>
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Fecha de Terminación Laboral</label>
									<input type="text" class="form-control" :value="usuario.fecfinal_per" disabled>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card mt-4" id="profesion">
					<div class="card-header d-flex">
						<h5 class="mb-0">Profesión</h5>
					</div>
					<div class="card-body pt-0">
						<div class="row">
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Profesión</label>
									<input type="text" class="form-control" :value="usuario.profe_per" disabled>
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-static">
									<label>Cargo</label>
									<input type="text" class="form-control" :value="usuario.cargo_per" disabled>
								</div>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-lg-8 col-12 actions text-end ms-auto">
								<Link :href="route('usuarios.index')" class="btn btn-outline-dark mb-0">Volver</Link>
								<Link :href="route('usuarios.edit', usuario.id)" class="btn bg-gradient-blue mb-0 ms-1">Editar</Link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</app-layout>
</template>
<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout'
import { Link } from '@inertiajs/inertia-vue3';

export default {
	components: {
		AppLayout,
		Link,
	},
	props: {
		'usuario': Object
	},
}
</script>
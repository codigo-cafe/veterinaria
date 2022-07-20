<template>
	<app-layout>
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item w-50" role="presentation">
				<button class="nav-link w-100 " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-paw me-2"></i>Perfil de la Mascota</button>
			</li>
			<li class="nav-item w-50" role="presentation">
				<button class="nav-link w-100 active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-file-alt me-2"></i> Historial Médico</button>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="row my-4">
					<div class="col-lg-3">
						<div class="card position-sticky top-1">
							<ul class="nav flex-column bg-white border-radius-lg p-3">
								<li class="nav-item">
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
						<div class="card card-body" id="mascota">
							<div class="row justify-content-center align-items-center">
								<div class="col-sm-auto col-4">
									<div class="avatar avatar-xl position-relative">
										<img :src="mascota.cliente.sexo_clie === 'Masculino' ? '/img/man.png' : '/img/woman.png'" alt="bruce" class="w-100 rounded-circle shadow-sm">
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
											<label>Pelaje</label>
											<input type="text" class="form-control" :value="mascota.pelaje_masc" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-static">
											<label>Sexo</label>
											<input type="text" class="form-control" :value="mascota.sexo_masc" disabled>
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
											<input type="text" class="form-control" :value="mascota.edad_masc + ' años' " disabled>
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
											<input type="text" class="form-control" :value="mascota.cliente.nom_clie" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-static">
											<label>Apellidos</label>
											<input type="text" class="form-control" :value="mascota.cliente.ape_clie" disabled>
										</div>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-6">
										<div class="input-group input-group-static">
											<label>Cédula</label>
											<input type="text" class="form-control" :value="mascota.cliente.cedula_clie" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-static">
											<label>Ocupación</label>
											<input type="text" class="form-control" :value="mascota.cliente.ocupacion_clie" disabled>
										</div>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-6">
										<div class="input-group input-group-static">
											<label>Edad</label>
											<input type="text" class="form-control" :value="mascota.cliente.edad_clie + ' años'" disabled>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group input-group-static">
											<label>Sexo</label>
											<input type="text" class="form-control" :value="mascota.cliente.sexo_clie" disabled>
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

						<div class="card mt-4" id="imagenes">
							<div class="card-header d-flex">
								<h5 class="mb-0">Imágenes</h5>
							</div>
							<div class="card-body pt-0">
								<div class="row d-flex justify-content-center">
									<div class="col-md-12">
										<div v-if="mascota.imagenes.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
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
												<button type="button" data-bs-target="#carouselImagenesMascota" :data-bs-slide-to="index" :class="{ 'active' : index === 0 }" :aria-current="{ true : index === 0 }" aria-label="Imagen" v-for="(imagen, index) in mascota.imagenes" :key="imagen.id_img"></button>
											</div>
											<div class="carousel-inner">
												<div class="carousel-item" :class="{ 'active' : index === 0 }" v-for="(imagen, index) in mascota.imagenes" :key="imagen.id_img">
													<img :src="imagen.url_img" class="d-block w-100 carousel-cover" alt="mascota.nom_masc">
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
										<Link :href="route('mascotas.index')" class="btn btn-outline-dark mb-0">Volver</Link>
										<Link :href="route('mascotas.edit', mascota.id_masc)" class="btn bg-gradient-blue mb-0 ms-1">Editar</Link>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade mt-4 show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="col-lg-9 mt-lg-0 mx-auto">
					<div class="card" id="mascota">
						<div class="card-header pb-0">
							<h5 class="mb-0 d-inline me-2">Exámenes</h5>
							<span class="badge badge-info ms-auto mb-auto">{{ mascota.examenes.length }}</span>
						</div>
						<div class="card-body pt-2">
							<div class="row">
								<div class="table-responsive" v-if="mascota.examenes.length !== 0">
									<table class="table align-items-center mb-4">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Título del Examen</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Imagen</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="examen in mascota.examenes" :key="examen.id_exa">
												<td class="text-sm font-weight-normal">{{ examen.id_exa }}</td>
												<td class="text-sm font-weight-normal">{{ examen.titu_exa }}</td>
												<td class="text-sm font-weight-normal">{{ examen.descrip_exa }}</td>
												<td class="text-sm font-weight-normal">
													<div class="d-flex mt-4 pt-2">
														<figure>
															<img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" :src="examen.img_exa" :alt="examen.titu_exa">
														</figure>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col">
									<div v-if="mascota.examenes.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con examenes.</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-4">
						<div class="card-header pb-0">
							<h5 class="mb-0 d-inline me-2">Vacunas</h5>
							<span class="badge badge-info ms-auto mb-auto">{{ mascota.examenes.length }}</span>
						</div>
						<div class="card-body pt-2">
							<div class="row">
								<div class="table-responsive" v-if="mascota.vacunas.length !== 0">
									<table class="table align-items-center mb-4">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre de la Vacuna</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dosis</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Aplicación</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha Próxima</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="vacuna in mascota.vacunas" :key="vacuna.id_vac">
												<td class="text-sm font-weight-normal">{{ vacuna.id_vac }}</td>
												<td class="text-sm font-weight-normal">{{ vacuna.nom_vac }}</td>
												<td class="text-sm font-weight-normal">{{ vacuna.dosis_vac }}</td>
												<td class="text-sm font-weight-normal">{{ vacuna.fecapl_vac }}</td>
												<td class="text-sm font-weight-normal">{{ vacuna.fecprox_vac }}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col">
									<div v-if="mascota.vacunas.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con vacunas.</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-4">
						<div class="card-header pb-0">
							<h5 class="mb-0 d-inline me-2">Tratamientos</h5>
							<span class="badge badge-info ms-auto mb-auto">{{ mascota.tratamientos.length }}</span>
						</div>
						<div class="card-body pt-2">
							<div v-for="tratamiento in mascota.tratamientos">
								<div class="row">
									<strong class="mb-0 mt-4">Tratamiento: {{ tratamiento.id_tra }} en fecha {{ fecha(tratamiento.fec_tra) }}</strong>
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
							<div class="row">
								<div class="col">
									<div v-if="mascota.tratamientos.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con tratamientos.</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-4">
						<div class="card-header pb-0">
							<h5 class="mb-0 d-inline me-2">Atenciones</h5>
							<span class="badge badge-info ms-auto mb-auto">{{ mascota.atenciones.length }}</span>
						</div>
						<div class="card-body pt-2">
							<div class="row">
								<div class="table-responsive" v-if="mascota.atenciones.length !== 0">
									<table class="table align-items-center mb-4">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Atención</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo de Atención</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Peso</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Temperatura</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Obtención</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="atencion in mascota.atenciones" :key="atencion.id_aten">
												<td class="text-sm font-weight-normal">{{ atencion.id_aten }}</td>
												<td class="text-sm font-weight-normal">{{ atencion.fech_aten }}</td>
												<td class="text-sm font-weight-normal">{{ atencion.tipo_aten }}</td>
												<td class="text-sm font-weight-normal">{{ atencion.peso_aten }}</td>
												<td class="text-sm font-weight-normal">{{ atencion.temp_aten }}</td>
												<td class="text-sm font-weight-normal">{{ atencion.descrip_aten }}</td>
												<td class="text-sm font-weight-normal">{{ atencion.obtencion_masc }}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col">
									<div v-if="mascota.atenciones.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con atenciones.</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-4">
						<div class="card-header pb-0">
							<h5 class="mb-0 d-inline me-2">Citas Médicas</h5>
							<span class="badge badge-info ms-auto mb-auto">{{ mascota.citas.length }}</span>
						</div>
						<div class="card-body pt-2">
							<div class="row">
								<div class="table-responsive" v-if="mascota.citas.length !== 0">
									<table class="table align-items-center mb-4">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo de Cita</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de la Cita</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="cita in mascota.citas" :key="cita.id_cita">
												<td class="text-sm font-weight-normal">{{ cita.id_cita }}</td>
												<td class="text-sm font-weight-normal">{{ cita.tipo_cita }}</td>
												<td class="text-sm font-weight-normal">{{ cita.fec_cita }}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col">
									<div v-if="mascota.citas.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con citas médicas.</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card mt-4">
						<div class="card-header pb-0">
							<h5 class="mb-0 d-inline me-2">Hospitalizaciones</h5>
							<span class="badge badge-info ms-auto mb-auto">{{ mascota.hospitalizaciones.length }}</span>
						</div>
						<div class="card-body pt-2">
							<div class="row">
								<div class="table-responsive" v-if="mascota.hospitalizaciones.length !== 0">
									<table class="table align-items-center mb-4">
										<thead class="thead-light">
											<tr>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Id</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Ingreso</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Finalización</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estado</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descripción</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Signología</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Temperatura Corporal</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Color de la Mucosa</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Palpa Abdominal</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Estado de la Piel</th>
												<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Frecuencia Cardiaca</th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="hospitalizacion in mascota.hospitalizaciones" :key="hospitalizacion.ficha_hosp">
												<td class="text-sm font-weight-normal">{{ hospitalizacion.ficha_hosp }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.fecing_hosp }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.fecfin_hosp }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.estado_hosp }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.descrip_hosp }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.signologia }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.temp_corp }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.color_mucosa }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.palpa_abdominal }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.piel }}</td>
												<td class="text-sm font-weight-normal">{{ hospitalizacion.frecue_cardia }}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col">
									<div v-if="mascota.hospitalizaciones.length === 0" class="alert alert-secondary alert-dismissible fade show mb-4 text-white" role="alert">
										<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
										<span class="alert-text"><strong>Mensaje:</strong> Esta mascota aún no cuenta con hospitalizaciones.</span>
									</div>
								</div>
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
		'mascota': Object
	},

	data() {
		return {
			fecnac_masc: moment(this.mascota.fecnac_masc).format('DD/MM/YYYY'),
		}
	},

	mounted() {

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
<template>
	<app-layout>
		<div class="d-flex justify-content-center align-items-center mt-4 row">
			<div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
				<div class="row">
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-address-card"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Usuarios</p>
									<h4 class="mb-0">{{ usuarios }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-users"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Clientes</p>
									<h4 class="mb-0">{{ clientes }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-paw"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Mascotas</p>
									<h4 class="mb-0">{{ mascotas }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-barcode"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Productos</p>
									<h4 class="mb-0">{{ productos }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-cart-plus"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Ventas</p>
									<h4 class="mb-0">{{ ventas }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-ambulance"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Atención</p>
									<h4 class="mb-0">{{ atencion }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-briefcase-medical"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Hospitalización</p>
									<h4 class="mb-0">{{ hospitalizacion }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-heartbeat"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Exámenes</p>
									<h4 class="mb-0">{{ examenes }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-capsules"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Tratamientos</p>
									<h4 class="mb-0">{{ tratamientos }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-file-alt"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Historias Clínicas</p>
									<h4 class="mb-0">{{ mascotas }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-calendar-alt"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Citas Médicas</p>
									<h4 class="mb-0">{{ citas }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6 mb-xl-4 mb-4">
						<div class="card">
							<div class="card-header p-3 pt-2">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-syringe"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Vacunación</p>
									<h4 class="mb-0">{{ vacunacion }}</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-sm-6">
						<div class="card">
							<div class="card-header p-3 pt-2 border-radius-xl">
								<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4 d-block m-auto">
									<i class="fas fa-cogs"></i>
								</div>
								<div class="text-center pt-2">
									<p class="text-sm mb-0 text-capitalize">Configuración</p>
									<h4 class="mb-0"></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">

			</div>
		</div>
	</app-layout>
</template>
<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout'

export default {
	components: {
		AppLayout,
	},

	props: [
		'usuarios',
		'clientes',
		'mascotas',
		'productos',
		'ventas',
		'atencion',
		'hospitalizacion',
		'examenes',
		'tratamientos',
		'historias',
		'citas',
		'vacunacion',
	],

	mounted() {

	},

	methods: {

	},
}
</script>
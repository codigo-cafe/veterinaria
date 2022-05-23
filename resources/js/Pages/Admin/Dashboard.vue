<template>
	<app-layout>
		<div class="d-flex justify-content-center align-items-center mt-4">
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
								<i class="fas fa-paw"></i>
							</div>
							<div class="text-center pt-2">
								<p class="text-sm mb-0 text-capitalize">Mascotas</p>
								<h4 class="mb-0">2,300</h4>
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
								<h4 class="mb-0">3,462</h4>
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
								<h4 class="mb-0">103,430</h4>
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
								<h4 class="mb-0">530</h4>
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
								<h4 class="mb-0">2,300</h4>
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
								<h4 class="mb-0">462</h4>
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
								<h4 class="mb-0">3,430</h4>
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
								<h4 class="mb-0">8</h4>
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
		'usuarios'
	],

	mounted() {

	},

	methods: {

	},
}
</script>
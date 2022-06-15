<template>
	<app-layout>
		<div class="col-12 mt-2">
			<div class="card">
				<div class="card-header px-3 pb-0 pt-2">
					<div class="icon icon-lg icon-shape bg-gradient-blue shadow-blue text-center border-radius-xl mt-n4">
						<i class="fas fa-address-card"></i>
					</div>
				</div>
				<div class="card-body">
					<h6 class="card-title text-dark text-gradient">Lista de Productos</h6>
					<div class="d-flex justify-content-end">
						<Link :href="route('productos.create')" class="btn btn-blue">
							<i class="fas fa-plus"></i> Registrar Producto
						</Link>
					</div>
					<div class="row">
						<div class="col-auto d-flex">
							<div class="input-group input-group-static align-items-center">
								<select class="form-select d-inline text-center" v-model="params.entries" id="entries">
									<option value="5">5</option>
									<option value="10">10</option>
									<option value="15">15</option>
									<option value="20">20</option>
									<option value="25">25</option>
								</select>
								<label for="entries" class="my-auto ms-2">Resultados por página</label>
							</div>
						</div>
						<div class="col-md-auto ms-md-auto">
							<div class="input-group input-group-outline my-3" :class="{'is-focused' : params.search != ''}">
								<label class="form-label">Buscar</label>
								<input type="search" v-model="params.search" class="form-control">
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table align-items-center mb-4" id="datatable">
							<thead class="thead-light">
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										<a href="#" @click="sort('id_pro')" class="w-100 d-inline-flex justify-content-between text-secondary">#</a>
										<i v-if="params.field ==='id_pro' && params.direction === 'asc'" class="fas fa-sort-down fa-lg"></i>
										<i v-if="params.field ==='id_pro' && params.direction === 'desc'" class="fas fa-sort-up fa-lg"></i>
									</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										<a href="#" @click="sort('nom_pro')" class="w-100 d-inline-flex justify-content-between text-secondary">Nombre Producto</a>
										<i v-if="params.field ==='nom_pro' && params.direction === 'asc'" class="fas fa-sort-down fa-lg" style="right: 4px;"></i>
										<i v-if="params.field ==='nom_pro' && params.direction === 'desc'" class="fas fa-sort-up fa-lg" style="right: 4px;"></i>
									</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										<a href="#" @click="sort('fecven_pro')" class="w-100 d-inline-flex justify-content-between text-secondary">Fecha de Vencimiento</a>
										<i v-if="params.field ==='fecven_pro' && params.direction === 'asc'" class="fas fa-sort-down fa-lg" style="right: 4px;"></i>
										<i v-if="params.field ==='fecven_pro' && params.direction === 'desc'" class="fas fa-sort-up fa-lg" style="right: 4px;"></i>
									</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										<a href="#" @click="sort('cantidad_pro')" class="w-100 d-inline-flex justify-content-between text-secondary">Cantidad</a>
										<i v-if="params.field ==='cantidad_pro' && params.direction === 'asc'" class="fas fa-sort-down fa-lg" style="right: 4px;"></i>
										<i v-if="params.field ==='cantidad_pro' && params.direction === 'desc'" class="fas fa-sort-up fa-lg" style="right: 4px;"></i>
									</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
										<a href="#" @click="sort('precio_pro')" class="w-100 d-inline-flex justify-content-between text-secondary">Precio Unitario</a>
										<i v-if="params.field ==='precio_pro' && params.direction === 'asc'" class="fas fa-sort-down fa-lg" style="right: 4px;"></i>
										<i v-if="params.field ==='precio_pro' && params.direction === 'desc'" class="fas fa-sort-up fa-lg" style="right: 4px;"></i>
									</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Acciones</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="producto in productos.data" :key="producto.id_pro">
									<td class="text-sm font-weight-normal">{{ producto.id_pro }}</td>
									<td class="text-sm font-weight-normal">{{ producto.nom_pro }}</td>
									<td class="text-sm font-weight-normal">{{ fecha(producto.fecven_pro) }}</td>
									<td class="text-sm font-weight-normal">{{ producto.cantidad_pro }}</td>
									<td class="text-sm font-weight-normal">{{ producto.precio_pro }}</td>
									<td class="text-sm">
										<div class="d-flex justify-content-center align-items-center">
											<Link :href="route('productos.show', producto.id_pro)" class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-2 btn-md d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-original-title="Mostrar">
												<i class="material-icons text-lg">visibility</i>
											</Link>
											<Link :href="route('productos.edit', producto.id_pro)" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-2 btn-md d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-original-title="Editar">
												<i class="material-icons text-lg">edit</i>
											</Link>
											<button type="button" @click="destroy(producto)" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-2 btn-md d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-original-title="Eliminar">
												<i class="material-icons text-lg">clear</i>
											</button>
										</div>
									</td>
								</tr>
								<tr v-if="productos.data.length == 0">
									<td class="text-center" colspan="100%">No se encontraron resultados</td>
								</tr>
							</tbody>
						</table>
						<pagination class="mt-4 mb-2" :links="productos.links" :results="productos" />
					</div>
					<!--  end card  -->
				</div>
				<!-- end col-md-12 -->
			</div>
		</div>
		<!-- Modal Create -->
		<confirm :infomodal="infomodal"/>
	</app-layout>
</template>
<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout';
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from '@/Pages/Admin/Partials/Pagination';
import Confirm from '@/Pages/Admin/Partials/Confirm';
import moment from 'moment';

export default {
	components: {
		AppLayout,
		Link,
		Pagination,
		Confirm,
	},

	props: {
		productos: Object,
		filters: Object,
	},

	data() {
		return {
			params: {
				entries: this.filters.entries != null ? this.filters.entries : 10,
				search: this.filters.search != null ? this.filters.search : '',
				field: this.filters.field != null ? this.filters.field : 'id_pro',
				direction: this.filters.direction != null ? this.filters.direction : 'asc',
			},
			infomodal: {
				id: null,
				nombre: null,
				mensaje: "Seguro de eliminar el producto: ",
				url: "productos.destroy",
			},
		}
	},

	mounted(){
		this.focusripples();
	},

	watch: {
		params: {
			handler() {
				this.$inertia.get(this.route('productos.index'), this.params, { replace: true, preserveState: true });
			},
			deep: true,
		},
	},

	methods: {
		sort(field) {
			this.params.field = field;
			this.params.direction = this.params.direction === 'asc' ? 'desc' : 'asc'
		},

		destroy(producto){
			this.infomodal.id = producto.id_pro;
			this.infomodal.nombre = producto.nom_pro;
			var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'))
			confirmModal.show()
		},

		fecha: function (date) {
			if (date) {
				return moment(date).format('DD/MM/YYYY');
			} else {
				return '';
			}
		},

		focusripples() {
			this.$nextTick(function () {
				//tooltips
				var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
				var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
					return new bootstrap.Tooltip(tooltipTriggerEl)
				})

				// Material Design Input function
		        var inputs = document.querySelectorAll('input');

		        for (var i = 0; i < inputs.length; i++) {
		            inputs[i].addEventListener('focus', function(e) {
		                this.parentElement.classList.add('is-focused');
		            }, false);

		            inputs[i].onkeyup = function(e) {
		                if (this.value != "") {
		                    this.parentElement.classList.add('is-filled');
		                } else {
		                    this.parentElement.classList.remove('is-filled');
		                }
		            };

		            inputs[i].addEventListener('focusout', function(e) {
		                if (this.value != "") {
		                    this.parentElement.classList.add('is-filled');
		                }
		                this.parentElement.classList.remove('is-focused');
		            }, false);
		        }

		        // Ripple Effect
		        var ripples = document.querySelectorAll('.btn');

		        for (var i = 0; i < ripples.length; i++) {
		            ripples[i].addEventListener('click', function(e) {
		                var targetEl = e.target;
		                var rippleDiv = targetEl.querySelector('.ripple');

		                rippleDiv = document.createElement('span');
		                rippleDiv.classList.add('ripple');
		                rippleDiv.style.width = rippleDiv.style.height = Math.max(targetEl.offsetWidth, targetEl.offsetHeight) + 'px';
		                targetEl.appendChild(rippleDiv);

		                rippleDiv.style.left = (e.offsetX - rippleDiv.offsetWidth / 2) + 'px';
		                rippleDiv.style.top = (e.offsetY - rippleDiv.offsetHeight / 2) + 'px';
		                rippleDiv.classList.add('ripple');
		                setTimeout(function() {
		                    rippleDiv.parentElement.removeChild(rippleDiv);
		                }, 600);
		            }, false);
		        }
			});
		},
	},
}
</script>
<template>
	<!-- Modal -->
	<div class="modal fade mt-6" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h6 class="modal-title" id="exampleModalLabel">Su atención es requerida</h6>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div v-if="infomodal.nombre" class="text-center">
						<h4 class="text-gradient text-danger">
							<i class="fas fa-bell"></i>
						</h4>
						<p>
							¿{{ infomodal.mensaje }}<strong>{{ infomodal.nombre }}</strong>?
						</p>
					</div>
				</div>
				<div class="modal-footer mx-auto">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="button" @click="destroy" class="btn bg-gradient-danger">Eliminar</button>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
		props: {
			infomodal: Object,
		},

		methods: {
			destroy() {
				this.$inertia.delete(this.route(this.infomodal.url, this.infomodal.id));
				this.closeModalConfirm();
			},

			closeModalConfirm() {
                var confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'))
                confirmModal.hide();
            },

		}
	}
</script>
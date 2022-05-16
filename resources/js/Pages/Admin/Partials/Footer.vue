<template>
	<footer class="footer pt-5">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-lg-between">
				<div class="col-lg-12 mb-lg-0 mb-4">
					<div class="copyright text-center text-sm text-muted text-lg-left">
						© <span v-text="year"></span>
						desarrollado con <i class="fa fa-heart"></i> por
						<a href="#" class="font-weight-bold text-dark text-gradient" target="_blank">Juan Camilo Saenz Valencia</a>.
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>
<script>
    export default {
        data() {
            return {
                year: new Date().getFullYear(),
            }
        },
    }
</script>
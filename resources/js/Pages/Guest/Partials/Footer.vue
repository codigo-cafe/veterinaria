<template>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-12 my-auto">
                    <div class="copyright text-center text-sm text-white">
                        © <span v-text="year"></span>
						desarrollado con <i class="fa fa-heart"></i> por
						<a href="#" class="font-weight-bold text-info text-gradient" target="_blank">Juan Camilo Saenz Valencia</a>.
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
<template>
	<Head title="Panel de Control" />
	<Sidebar></Sidebar>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
		<Nav></Nav>
		<transition name="slide-fade">
			<div class="container-fluid py-4" v-if="show">
				<div class="row min-vh-80 h-100">
					<div class="col-12">
						<div v-if="$page.props.flash.status" class="alert alert-success alert-dismissible fade show mb-4 text-white" role="alert">
							<span class="alert-icon me-2"><i class="fas fa-bell"></i></span>
							<span class="alert-text"><strong>Mensaje:</strong> {{ $page.props.flash.status }}</span>
							<button type="button" class="btn-close d-flex justify-content-center align-items-center" data-bs-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<slot></slot>
					</div>
				</div>
			</div>
		</transition>
		<div class="container-fluid">
			<Footer/>
		</div>
	</main>
</template>
<script>
import Nav from '@/Pages/Admin/Partials/Nav'
import Footer from '@/Pages/Admin/Partials/Footer'
import Sidebar from '@/Pages/Admin/Partials/Sidebar'
import { Head } from '@inertiajs/inertia-vue3';
export default {
	components: {
		Nav,
		Footer,
		Sidebar,
		Head,
	},

	data() {
		return {
			show: false,
		}
	},

	mounted(){
		this.show = true;
	}
};
</script>

<style>
    /* Enter and leave animations can use different */
	/* durations and timing functions.              */
	.slide-fade-enter-active {
	  transition: all 0.3s ease-out;
	}

	.slide-fade-leave-active {
	  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
	}

	.slide-fade-enter-from,
	.slide-fade-leave-to {
	  transform: translateX(20px);
	  opacity: 0;
	}
</style>

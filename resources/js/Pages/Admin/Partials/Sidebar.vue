<template>
    <aside class="sidenav bg-cover navbar navbar-vertical navbar-expand-xs border-0 fixed-start bg-gradient-dark" id="sidenav-main" style="background-image: url('/img/sidebars/sidebar15.jpg'); background-position: center;">
        <span class="mask bg-solid-dark" style="z-index: -1;"></span>
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <Link class="navbar-brand m-0" :href="route('dashboard')" target="_blank">
                <img src="/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white text-uppercase">Veterinaria</span>
            </Link>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse w-auto max-height-vh-100 h-auto" id="sidenav-scrollbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('dashboard') }" :href="route('dashboard')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-home"></i>
                        </div>
                        <span class="nav-link-text ms-1">Inicio</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('usuarios.*') }" :href="route('usuarios.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="nav-link-text ms-1">Usuarios</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('clientes.*') }" :href="route('clientes.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="nav-link-text ms-1">Clientes</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('mascotas.*') }" :href="route('mascotas.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-paw"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mascotas</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('productos.*') }" :href="route('productos.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <span class="nav-link-text ms-1">Productos</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('ventas.*') }" :href="route('ventas.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <span class="nav-link-text ms-1">Ventas</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('atenciones.*') }" :href="route('atenciones.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <span class="nav-link-text ms-1">Atención</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('hospitalizaciones.*') }" :href="route('hospitalizaciones.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-briefcase-medical"></i>
                        </div>
                        <span class="nav-link-text ms-1">Hospitalización</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('examenes.*') }" :href="route('examenes.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <span class="nav-link-text ms-1">Exámenes</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('tratamientos.*') }" :href="route('tratamientos.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-capsules"></i>
                        </div>
                        <span class="nav-link-text ms-1">Tratamientos</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('historias.*') }" :href="route('historias.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">Historias</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('citas.*') }" :href="route('citas.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">Citas Médicas</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link text-white" :class="{ 'bg-blue active' : route().current('vacunas.*') }" :href="route('vacunas.index')">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <span class="nav-link-text ms-1">Vacunación</span>
                    </Link>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <Link class="btn btn-outline-white mt-4 w-100" :href="route('profile.show')" type="button">Configuraciones</Link>
            </div>
        </div>
    </aside>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },

    data() {
        return {
            usuarios: false,
            clientes: false,
            mascotas: false,
            productos: false,
            ventas: false,
            atenciones: false,
            hospitalizaciones: false,
            historias: false,
            citas: false,
            vacunas: false,
        }
    },

    mounted() {
        //console.log(route());
        //console.log(route().current());
        switch (route().current()) {
            case 'usuarios.index':
                this.usuarios = true;
            break;
            case 'clientes.index':
                this.clientes = true;
            break;
            case 'mascotas.index':
                this.mascotas = true;
            break;
            case 'productos.index':
                this.productos = true;
            break;
            case 'ventas.index':
                this.ventas = true;
            break;
            case 'atenciones.index':
                this.atenciones = true;
            break;
            case 'hospitalizaciones.index':
                this.hospitalizaciones = true;
            break;
            case 'historias.index':
                this.historias = true;
            break;
            case 'examenes.index':
                this.examenes = true;
            break;
            case 'tratamientos.index':
                this.tratamientos = true;
            break;
            case 'citas.index':
                this.citas = true;
            break;
            case 'vacunas.index':
                this.vacunas = true;
            break;
        }

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    },
}
</script>
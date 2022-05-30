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
                    <a class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <span class="nav-link-text ms-1">Productos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="nav-link-text ms-1">Historias</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <span class="nav-link-text ms-1">Citas Médicas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-syringe"></i>
                        </div>
                        <span class="nav-link-text ms-1">Vacunación</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn btn-outline-white mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Configuraciones</a>
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
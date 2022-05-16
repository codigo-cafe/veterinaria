<template>
    <Head title="Clínica Veterinaria" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin">
            <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
                <div class="container">
                    <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                        Veterinaria
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon mt-2">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
                        <ul class="navbar-nav navbar-nav-hover ms-auto">
                            <li class="nav-item ms-lg-auto">
                                <Link v-if="$page.props.user" :href="route('dashboard')" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                                    <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
                                    Panel de Control
                                </Link>
                                <template v-else>
                                    <Link :href="route('login')" class="btn btn-sm bg-white mb-0 me-1 mt-2 mt-md-0">Iniciar Sesión</Link>
                                    <Link v-if="canRegister" :href="route('register')" class="nav-link nav-link-icon me-2">
                                        Registrarse
                                    </Link>
                                </template>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <header class="bg-gradient-dark">
                <div id="carouselExampleControls" class="page-header min-vh-100 carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="page-header min-vh-100" style="background-image: url('/img/bg-1.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Servicios</h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom">Clínica e Internación</h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Contamos con una clínica en la que tenemos nuestro quirófano, el cual está preparado para todo tipo de cirugías en general.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="page-header min-vh-100" style="background-image: url('/img/bg-2.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Servicios</h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom">Vacunación</h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Tener un calendario de vacunas es importante para la vida de tu animal de compañía y también para evitar todo tipo de riesgos en casa.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="page-header min-vh-100" style="background-image: url('/img/bg-3.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 my-auto">
                                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Servicios</h4>
                                            <h1 class="text-white fadeIn2 fadeInBottom">Estudios</h1>
                                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Contamos con un equipo especializado en el área veterinaria, los cuales nos dan los resultadosen un máximo de 8 minutos.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="min-vh-100 position-absolute w-100 top-0">
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </a>
                    </div>
                </div>
            </header>
        </div>
    </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>
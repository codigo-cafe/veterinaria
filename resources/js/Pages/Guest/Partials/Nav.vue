<template>
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
        <div class="container">
            <Link class="navbar-brand text-white" :href="route('home')" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                Veterinaria
            </Link>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <Link :href="route('home')" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                            <i class="material-icons opacity-6 me-2 text-md">home</i>
                            Inicio
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    export default {
        components: {
            Head,
            Link,
        }
    }
</script>
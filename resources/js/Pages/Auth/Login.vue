<template>
    <Head title="Iniciar Sesión" />

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
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <Link :href="route('home')" class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center">
                            <i class="material-icons opacity-6 me-2 text-md">home</i>
                            Inicio
                        </Link>
                    </li>
                    <li class="nav-item my-auto ms-3 ms-lg-0">
                        <Link :href="route('home')" class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0">Inicio</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80');" loading="lazy">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center my-2">Iniciar Sesión</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" @submit.prevent="submit">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                    class="form-control" :class="{ 'is-invalid': errors.email}"
                                    v-model="form.email"
                                    >
                                    <div v-if="errors.email" class="invalid-feedback">{{ errors.email }}</div>
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password"
                                    class="form-control" :class="{ 'is-invalid': errors.password}"
                                    v-model="form.password"
                                    autocomplete="current-password">
                                    <div v-if="errors.password" class="invalid-feedback">{{ errors.password }}</div>
                                </div>
                                <div class="form-check form-switch d-flex align-items-center mb-3">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" v-model="form.remember" name="remember">
                                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Ingresar</button>
                                </div>
                                <p v-if="canResetPassword" :href="route('password.request')" class="mt-4 text-sm text-center">
                                    Forgot your password?
                                </p>
                            </form>
                            <div v-if="status" class="mb-4 font-medium text-sm text-success">
                                {{ status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-12 my-auto">
                        <div class="copyright text-center text-sm text-white">
                            © 2022,
                            made with <i class="fa fa-heart" aria-hidden="true"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Head,
        Link,
        useForm,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
        errors: Object,
    },

    data() {
        return {
            form: useForm({
                email: '',
                password: '',
                remember: false,
            })
        }
    },

    mounted(){
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
    },

    methods: {
        submit() {
            this.form.transform(data => ({
                ...data,
                remember: this.form.remember ? 'on' : '',
            })).post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        }
    }
}
</script>
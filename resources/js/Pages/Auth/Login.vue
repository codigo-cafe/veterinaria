<template>
    <Head title="Iniciar Sesión" />
    <app-layout>
        <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-blue shadow-blue border-radius-lg py-3 pe-1">
                    <h4 class="text-white font-weight-bolder text-center my-2">Iniciar Sesión</h4>
                </div>
            </div>
            <div class="card-body">
                <form role="form" class="text-start" @submit.prevent="submit">
                    <p class="text-center text-sm mt-2 mb-4">Por favor ingrese sus credenciales de acceso.</p>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email"
                            class="form-control" :class="{ 'is-invalid': errors.email }"
                            v-model="form.email"
                            autofocus
                            >
                        <div v-if="errors.email" class="invalid-feedback">{{ errors.email }}</div>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password"
                            class="form-control" :class="{ 'is-invalid': errors.password }"
                            v-model="form.password"
                            autocomplete="current-password">
                        <div v-if="errors.password" class="invalid-feedback">{{ errors.password }}</div>
                    </div>
                    <div class="form-check form-switch d-flex align-items-center mb-3">
                        <input class="form-check-input" type="checkbox" id="rememberMe" v-model="form.remember" name="remember">
                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Mantener Sesión</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-blue w-100 my-4 mb-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Ingresar</button>
                    </div>
                    <div class="text-center py-2">
                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-dark">
                            Olvidé mi contraseña?
                        </Link>
                    </div>
                </form>
                <div v-if="status" class="mb-4 font-medium text-sm text-success text-center">
                    {{ status }}
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AppLayout from '@/Pages/Guest/Layouts/AppLayout'
export default {
    components: {
        Head,
        Link,
        AppLayout
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
<template>
    <Head title="¿Olvidaste tu Contraseña?" />
    <app-layout>
        <div v-if="status" class="alert alert-success alert-dismissible fade show my-4" role="alert">
            <span class="alert-icon"><i class="fas fa-bell pe-1"></i></span>
            <span class="alert-text">{{ status }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-blue shadow-blue border-radius-lg py-3 pe-1">
                    <h5 class="text-white font-weight-bolder text-center my-2">¿Olvidaste tu Contraseña?</h5>
                </div>
            </div>
            <div class="card-body">
                <form role="form" class="text-start" @submit.prevent="submit">
                    <p class="text-center text-sm mt-2 mb-4">No hay problema. Simplemente déjenos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.</p>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Correo Electrónico</label>
                        <input type="email"
                            class="form-control"
                            :class="{ 'is-invalid': errors.email }"
                            v-model="form.email"
                            aria-label="Email"
                            aria-describedby="email-addon"
                            autofocus
                            >
                        <div v-if="errors.email" class="invalid-feedback">{{ errors.email }}</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-blue w-100 my-2 mb-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Enviar enlace</button>
                        <Link :href="route('login')" class="btn bg-gradient-secondary w-100 mb-2">Volver Atrás</Link>
                    </div>
                </form>
                <div v-if="status" class="mb-4 font-medium text-sm text-center text-success">
                    {{ status }}
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Pages/Guest/Layouts/AppLayout'

    export default {
        components: {
            Head,
            Link,
            AppLayout,
        },

        props: {
            errors: Object,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
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
                this.form.post(this.route('password.email'))
            }
        }
    }
</script>
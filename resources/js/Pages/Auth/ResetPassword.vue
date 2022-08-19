<template>
    <Head title="¿Restablecer Contraseña?" />
    <app-layout>
        <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-blue shadow-blue border-radius-lg py-3 pe-1">
                    <h5 class="text-white font-weight-bolder text-center my-2">¿Restablecer Contraseña?</h5>
                </div>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email"
                                class="form-control"
                                :class="{ 'is-invalid': errors.email }"
                                v-model="form.email"
                                aria-label="Email"
                                aria-describedby="email-addon"
                                required
                                autofocus
                                >
                            <div v-if="errors.email" class="invalid-feedback">{{ errors.email }}</div>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Nueva Contraseña</label>
                            <input type="password"
                                class="form-control"
                                :class="{ 'is-invalid': errors.password }"
                                v-model="form.password"
                                required
                                >
                            <div v-if="errors.password" class="invalid-feedback">{{ errors.password }}</div>
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Confirmar Contraseña</label>
                            <input type="password"
                                class="form-control"
                                :class="{ 'is-invalid': errors.password_confirmation }"
                                v-model="form.password_confirmation"
                                required
                                >
                            <div v-if="errors.password_confirmation" class="invalid-feedback">{{ errors.password_confirmation }}</div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-blue w-100 my-2 mb-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Restablecer Contraseña</button>
                    </div>
                </form>
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
            email: String,
            token: String,
            errors: Object,
        },

        data() {
            return {
                form: this.$inertia.form({
                    token: this.token,
                    email: this.email,
                    password: '',
                    password_confirmation: '',
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
                this.form.post(this.route('password.update'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
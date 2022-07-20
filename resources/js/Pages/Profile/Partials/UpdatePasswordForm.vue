<template>
    <form @submit.prevent="submit">
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Cambiar Contraseña</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': form.errors.current_password }">
                            <label>Contraseña Actual</label>
                            <input type="password"
                                class="form-control"
                                v-model="form.current_password"
                                placeholder="Contraseña Actual"
                                autofocus>
                            <div v-if="form.errors.current_password" class="invalid-feedback">{{ form.errors.current_password }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': form.errors.password }">
                            <label>Nueva Contraseña</label>
                            <input type="password"
                                class="form-control"
                                v-model="form.password"
                                placeholder="Nueva Contraseña">
                            <div v-if="form.errors.password" class="invalid-feedback">{{ form.errors.password }}</div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="input-group input-group-static"
                            :class="{ 'is-invalid': form.errors.password_confirmation }">
                            <label>Confirmar Contraseña</label>
                            <input type="password"
                                class="form-control"
                                v-model="form.password_confirmation"
                                placeholder="Confirmar Contraseña">
                            <div v-if="form.errors.password_confirmation" class="invalid-feedback">{{ form.errors.password_confirmation }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12 col-12 actions text-end ms-auto">
                        <button type="submit" class="btn bg-gradient-blue mb-0 ms-1">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: this.$inertia.form({
                    current_password: '',
                    password: '',
                    password_confirmation: '',
                }),
            }
        },

        methods: {
            submit() {
                this.form.put(route('user-password.update'), {
                    errorBag: 'updatePassword',
                    preserveScroll: true,
                    onSuccess: () => {
                        this.form.reset()
                    },
                    onError: () => {
                        if (this.form.errors.password) {
                            this.form.reset('password', 'password_confirmation')
                            this.$refs.password.focus()
                        }

                        if (this.form.errors.current_password) {
                            this.form.reset('current_password')
                            this.$refs.current_password.focus()
                        }
                    }
                })
            },
        },
    }
</script>
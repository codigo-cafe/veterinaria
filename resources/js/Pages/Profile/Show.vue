<template>
    <app-layout>
        <div class="row">
            <div class="col-12">
                <div class="card card-body" id="mascota">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                                <img :src="$page.props.user.profile_photo_url" :alt="$page.props.user.nom_per" class="w-100 rounded-circle shadow-sm">
                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                                <h5 class="mb-1 font-weight-bolder">
                                    {{ $page.props.user.nom_per }} {{ $page.props.user.ape_per }}
                                </h5>
                                <p class="mb-0 font-weight-normal text-sm">
                                    {{ $page.props.user.correo_per }}
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <span class="badge badge-success ms-auto mb-auto">{{ $page.props.user.cargo_per }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 mt-lg-0 mt-4">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                    <update-profile-information-form :usuario="$page.props.user" :errors="errors"/>
                </div>
            </div>

            <div class="col-lg-3">
                <div v-if="$page.props.jetstream.canUpdatePassword">
                    <update-password-form/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Pages/Admin/Layouts/AppLayout';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm';
import LogoutOtherBrowserSessionsForm from './Partials/LogoutOtherBrowserSessionsForm';
import UpdatePasswordForm from './Partials/UpdatePasswordForm';

export default {
    props: ['sessions', 'errors'],

    components: {
        AppLayout,
        UpdateProfileInformationForm,
        LogoutOtherBrowserSessionsForm,
        UpdatePasswordForm,
    },

    created() {

    },

    methods: {
    }
}
</script>

<template>
    <aside class="sidenav bg-cover navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main" style="background-image: url('/img/sidebars/sidebar1.jpg'); background-position: center;">
        <span class="mask bg-gradient-dark" style="z-index: -1;"></span>
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white bg-gradient-primary active" href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">First page</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Second Page</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
            </div>
        </div>
        -->
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
            calendar: false,
            profile: false,
            organization: false,
            people: false,
            access: false,
        }
    },

    mounted() {
        //console.log(route());
        //console.log(route().current());
        switch (route().current()) {
            case 'categories.index':
            case 'events.index':
            case 'points.index':
                this.calendar = true;
            break;

            case 'classifications.index':
            case 'instruments.index':
            case 'services.index':
            case 'promotions.index':
                this.organization = true;
            break;

            case 'types.index':
            case 'people.index':
            case 'members.index':
            case 'users.index':
                this.people = true;
            break;

            case 'roles.index':
            case 'permissions.index':
                this.access = true;
            break;
        }
    },
}
</script>
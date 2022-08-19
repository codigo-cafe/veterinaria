<template>
    <div>
        <Nav></Nav>
        <!-- Page Content -->
        <div class="page-header align-items-start min-vh-100" style="background-image: url('/img/login2.jpg');" loading="lazy">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <slot></slot>
                    </div>
                </div>
            </div>
            <Footer></Footer>
        </div>
    </div>
</template>
<script>
    import Nav from '@/Pages/Guest/Partials/Nav'
    import Footer from '@/Pages/Guest/Partials/Footer'
    export default {
        components: {
            Nav,
            Footer
        }
    }
</script>
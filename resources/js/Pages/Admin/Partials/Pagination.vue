<template>
    <div v-if="links.length > 3">
        <div class="pagination-container d-flex">
            <div class="w-100 d-inline-flex justify-content-between">
                <p class="text-sm my-auto">Mostrando {{ results.per_page }} de {{ results.total }} resultados</p>
            </div>
            <ul class="pagination pagination-glaucous mb-0">
                <template v-for="(link, index) in links" :key="index">
                    <div v-if="index === 0">
                        <li class="page-item" :class="{ 'disabled cursor-not-allowed': link.url == null }">
                            <Link class="page-link" :href="link.url" aria-label="Anterior">
                                <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            </Link>
                        </li>
                    </div>
                    <li v-if="index > 0 && index < links.length - 1" class="page-item" :class="{ 'active': link.active }">
                        <Link class="page-link" :href="link.url" v-html="link.label"></Link>
                    </li>
                    <div v-if="index === links.length - 1">
                        <li class="page-item" :class="{ 'disabled cursor-not-allowed': link.url == null }">
                            <Link class="page-link" :href="link.url" aria-label="Siguiente">
                                <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                            </Link>
                        </li>
                    </div>
                </template>
            </ul>
        </div>
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link,
    },

    props: {
        links: Array,
        results: Object,
    },
}
</script> 
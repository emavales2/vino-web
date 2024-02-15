<template>
    <div class="bckgd">
        <!-- <section class="background_blobs">
            <figure class="fig_bg">
                <img src="@/../assets/img/coral_1.svg" class="coral_blob_bg" alt="">    
            </figure>
            <figure class="fig_bg">
                <img src="@/../assets/img/med_vino.svg" class="med_blob_bg" alt="">
            </figure>
            <figure class="fig_bg">
                <img src="@/../assets/img/dark_vino.svg" class="dkvin_blob_bg" alt="">
            </figure>
        </section> -->

        <div class="fiche_wine bckgd-coral">
            <main>
                <article>
                    <figure>
                        <img :src="wine.photo" :alt="wine.name">
                    </figure>
                    
                    <section>
                        <h1 class="block-font">{{ wine.name }}</h1>
                        <div>                        
                            <p v-if="wine.user_id">custom wine</p>
                            <p v-else>code saq: {{ wine.code_saq }}</p>
                            <div>
                            <h2>Information</h2>
                            <ul>
                                <li>type: {{ wine.type ? wine.type : 'n/a' }}</li>
                                <li>country: {{ wine.country ? wine.country : 'n/a' }}</li>
                                <li>size: {{ wine.size ? wine.size : 'n/a' }}</li>
                                <li>price: {{ wine.price ? wine.price + ' $' : 'n/a' }}</li>
                            </ul>
                            </div>
                        </div>
                    </section>
                </article>
            </main>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
// import { Inertia } from '@inertiajs/inertia';

export default {
    name:'Wine.ShowView',
    components: {
        Head,
        Link
    },
    layout: MainLayout,
    methods: {
        // here i need to put the methods for the buttons
        // logout() {
        //     Inertia.post(route('logout'));
        // }
    },
    props: ['wine'],
}
</script>


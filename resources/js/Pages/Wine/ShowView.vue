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
                <div class="">
                    <article>            
                        <figure>
                            <img :src="wine.photo" :alt="wine.name">
                        </figure>
                        
                        <!-- ----- * TEXT SIDE OF FICHE * ----- -->
                        <section>
                            <span class="country_line">
                                <ColorDrop :class="setColor(wine.type)"/>
                                <h6>{{ wine.country ? wine.country : 'n/a' }}</h6>
                            </span>

                            <h1 class="block-font fiche_wine_title">{{ wine.name }}</h1>
                            <div>                        
                                <p v-if="wine.user_id">custom wine</p>
                                <p v-else>code saq: {{ wine.code_saq }}</p>
                                <div>
                                <p>Information</p>
                                <ul>
                                    <li>{{ wine.type ? wine.type : 'n/a' }}</li>
                                    <!-- <li>country: {{ wine.country ? wine.country : 'n/a' }}</li> -->
                                    <li>{{ wine.size ? wine.size : 'n/a' }}</li>
                                    <li>price: {{ wine.price ? wine.price + ' $' : 'n/a' }}</li>
                                </ul>
                                </div>
                            </div>                   
                        </section>
                    </article>
                </div>

                <!-- ----- * FICHE NAV * ----- -->
                <aside>
                    <Link class="button" :href="route('buylist.create', { wine: wine.id })">Add to my shopping list</Link>
                </aside>
            </main>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import ColorDrop from '@/Components/ButtonsIcons/ColorDrop.vue'
// import { Inertia } from '@inertiajs/inertia';

export default {
    name:'Wine.ShowView',
    components: {
        Head,
        Link,
        ColorDrop
    },
    layout: MainLayout,
    methods: {
        setColor (color) {
      if(color) return color.split(' ')[1]
    },
        // here i need to put the methods for the buttons
        // logout() {
        //     Inertia.post(route('logout'));
        // }
    },
    props: ['wine'],
}
</script>


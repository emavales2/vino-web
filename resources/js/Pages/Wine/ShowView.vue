<template>
    <div class="bckgd bckgd-white float_up">
        <section class="background_blobs">
            <figure class="fig_bg bottom_blob">
                <img src="@/../assets/img/bott_cream_fiche.svg" alt="">    
            </figure>
            <figure class="fig_bg bottom_blob">
                <img src="@/../assets/img/bott_coral_fiche.svg" class="coral_blob_bg" alt="">    
            </figure>
        </section> 

        <main>
            <GoBackButton :color="'coral'" class="button_back"/>
            <div class="fiche_wine">
                <article class="flex-row gap_20">            
                    <figure>
                        <img :src="wine.photo" :alt="wine.name">
                    </figure>
                    
                    <!-- ----- * TEXT SIDE OF FICHE * ----- -->
                    <section>
                        <span class="country_line">
                            <ColorDrop :class="setColor(wine.type)"/>
                            <h3 class="fs_6 display-font burg-lt">{{ wine.country ? wine.country : 'n/a' }}</h3>
                        </span>
                        <h1 class="block-font fiche_wine_title coral">{{ wine.name }}</h1>
                        <div class="burg-lt">                        
                            <p v-if="wine.user_id">custom wine</p>
                            <p v-else>code saq: {{ wine.code_saq }}</p>
                            <div>
                            
                            <ul>
                                <li>{{ wine.type ? wine.type : 'n/a' }}</li>
                                <li>{{ wine.size ? wine.size : 'n/a' }}</li>
                                <li>price: {{ wine.price ? wine.price + ' $' : 'n/a' }}</li>
                            </ul>
                            </div>
                        </div>                   
                    </section>
                </article>
            </div>
        </main>
                <!-- ----- * NAV SECTION * ----- -->
                <aside class="flex-row pad_hor_general" v-if="!exists">
                    <Link class="button borderless" :href="route('buylist.create', { wine: wine.id })">
                        <figure>
                            <svg width="42" height="42" fill="var(--coral)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.63 57.77"><path class="cls-1" d="m42.74,19.27h-5.91c-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77Z"/><path class="cls-1" d="m42.74,28.5h-5.91c-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77Z"/><path class="cls-1" d="m42.74,40.8h-21.35c-.98,0-1.77-.79-1.77-1.77s.79-1.77,1.77-1.77h21.35c.98,0,1.77.79,1.77,1.77s-.79,1.77-1.77,1.77Z"/><path class="cls-1" d="m31.05,19.27h-10.14c-.71,0-1.28.57-1.28,1.28v10.14c0,.71.57,1.28,1.28,1.28h10.14c.71,0,1.28-.57,1.28-1.28v-10.14c0-.71-.57-1.28-1.28-1.28Zm-.87,4.67l-3.61,5.04c-.28.39-.72.6-1.17.6-.29,0-.58-.09-.83-.27l-2.74-1.96c-.64-.46-.79-1.35-.33-2,.46-.64,1.35-.79,2-.33l1.58,1.13,2.77-3.87c.46-.64,1.36-.79,2-.33s.79,1.36.33,2Z"/><path class="cls-1" d="m32.13,4.77c-1.93,0-3.81.21-5.63.61C23.75,2.09,19.62,0,15,0,6.72,0,0,6.72,0,15c0,4.89,2.35,9.23,5.98,11.97-.23,1.4-.35,2.84-.35,4.3,0,14.61,11.89,26.5,26.5,26.5s26.5-11.89,26.5-26.5S46.74,4.77,32.13,4.77ZM6.2,14.96c0-.83.67-1.5,1.5-1.5h5.8v-5.8c0-.83.67-1.5,1.5-1.5s1.5.67,1.5,1.5v5.8h5.8c.83,0,1.5.67,1.5,1.5s-.67,1.5-1.5,1.5h-5.8v5.8c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-5.8h-5.8c-.83,0-1.5-.67-1.5-1.5Zm25.93,39.8c-12.96,0-23.5-10.54-23.5-23.5,0-.89.05-1.77.15-2.63,1.9.87,4,1.36,6.22,1.36,8.28,0,15-6.72,15-15,0-2.5-.62-4.85-1.7-6.92,1.25-.2,2.52-.32,3.83-.32,12.96,0,23.5,10.54,23.5,23.5s-10.54,23.5-23.5,23.5Z"/></svg>
                        </figure>
                    </Link> 

                    <!-- <Link class="button" :href="route('cellar-wine.create', { wine: wine.id })">Add to my wine collection</Link> -->

                    <Link class="button borderless" :href="route('cellar-wine.create', { wine: wine.id })">
                        <figure>
                            <svg width="42" height="42" fill="var(--coral)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.63 57.77"><path class="cls-1" d="m42.76,19.27h-21.25c-1.04,0-1.88.84-1.88,1.88v21.25c0,1.03.84,1.87,1.88,1.87h21.25c1.03,0,1.87-.84,1.87-1.87v-21.25c0-1.04-.84-1.88-1.87-1.88Zm-1.13,22h-19v-19h19v19Z"/><circle class="cls-1" cx="32.05" cy="25.52" r="1.94"/><circle class="cls-1" cx="25.58" cy="25.52" r="1.94"/><circle class="cls-1" cx="38.53" cy="25.52" r="1.94"/><path class="cls-1" d="m39.62,28.73c-.07,0-.14,0-.2.02-.05,0-.18.05-.18.05,0,0-.03,0-.07.02-.9.21-1.92-.01-2.6-.69-.02-.03-.04-.06-.07-.09-.21-.44-.65-.75-1.17-.75s-.97.31-1.17.75h-.01s-.04.06-.07.09c-.52.52-1.23.77-1.94.77s-1.42-.26-1.94-.77c-.03-.03-.04-.06-.07-.09h-.01c-.2-.44-.64-.75-1.17-.75s-.96.31-1.17.75c-.03.03-.05.06-.07.09-.68.67-1.7.9-2.6.69-.04-.01-.07-.02-.07-.02,0,0-.13-.04-.18-.05-.06-.01-.13-.02-.2-.02-.56,0-1.02.45-1.02,1.02,0,.42.25.77.61.93.01,0,.16.06.23.07.42.13.84.18,1.3.18,1.19,0,2.31-.45,3.18-1.25.88.8,2,1.25,3.19,1.25s2.31-.45,3.19-1.25c.87.8,1.99,1.25,3.18,1.25.46,0,.88-.05,1.3-.18.07,0,.22-.07.23-.07.36-.16.61-.51.61-.93,0-.57-.46-1.02-1.02-1.02Z"/><circle class="cls-1" cx="32.05" cy="34.54" r="1.94"/><circle class="cls-1" cx="25.58" cy="34.54" r="1.94"/><circle class="cls-1" cx="38.53" cy="34.54" r="1.94"/><path class="cls-1" d="m39.62,37.76c-.07,0-.14,0-.2.02-.05,0-.18.05-.18.05,0,0-.03,0-.07.02-.9.21-1.92-.01-2.6-.69-.02-.03-.04-.06-.07-.09-.21-.44-.65-.75-1.17-.75s-.97.31-1.17.75h-.01s-.04.06-.07.09c-.52.52-1.23.77-1.94.77s-1.42-.26-1.94-.77c-.03-.03-.04-.06-.07-.09h-.01c-.2-.44-.64-.75-1.17-.75s-.96.31-1.17.75c-.03.03-.05.06-.07.09-.68.67-1.7.9-2.6.69-.04-.01-.07-.02-.07-.02,0,0-.13-.04-.18-.05-.06-.01-.13-.02-.2-.02-.56,0-1.02.45-1.02,1.02,0,.42.25.77.61.93.01,0,.16.06.23.07.42.13.84.18,1.3.18,1.19,0,2.31-.45,3.18-1.25.88.8,2,1.25,3.19,1.25s2.31-.45,3.19-1.25c.87.8,1.99,1.25,3.18,1.25.46,0,.88-.05,1.3-.18.07,0,.22-.07.23-.07.36-.16.61-.51.61-.93,0-.57-.46-1.02-1.02-1.02Z"/><path class="cls-1" d="m32.13,4.77c-1.93,0-3.81.21-5.63.61C23.75,2.09,19.62,0,15,0,6.72,0,0,6.72,0,15c0,4.89,2.35,9.23,5.98,11.97-.23,1.4-.35,2.84-.35,4.3,0,14.61,11.89,26.5,26.5,26.5s26.5-11.89,26.5-26.5S46.74,4.77,32.13,4.77ZM6.2,14.96c0-.83.67-1.5,1.5-1.5h5.8v-5.8c0-.83.67-1.5,1.5-1.5s1.5.67,1.5,1.5v5.8h5.8c.83,0,1.5.67,1.5,1.5s-.67,1.5-1.5,1.5h-5.8v5.8c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-5.8h-5.8c-.83,0-1.5-.67-1.5-1.5Zm25.93,39.8c-12.96,0-23.5-10.54-23.5-23.5,0-.89.05-1.77.15-2.63,1.9.87,4,1.36,6.22,1.36,8.28,0,15-6.72,15-15,0-2.5-.62-4.85-1.7-6.92,1.25-.2,2.52-.32,3.83-.32,12.96,0,23.5,10.54,23.5,23.5s-10.54,23.5-23.5,23.5Z"/></svg>
                        </figure>
                    </Link>

                    
                </aside>
        <!-- </div>   -->
            
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import ColorDrop from '@/Components/ButtonsIcons/ColorDrop.vue'
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
// import { Inertia } from '@inertiajs/inertia';

export default {
    name:'Wine.ShowView',
    components: {
        Head,
        Link,
        ColorDrop,
        GoBackButton
    },
    layout: MainLayout,
    methods: {
        setColor (color) {
            if(color) return color.split(' ')[1]
        },
    },
    props: {
        wine: Object, 
        exists: Boolean
    }
}
</script>


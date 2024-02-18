<template>
    <Head title="Cellars" />
    
    <div class="bckgd bckgd-burg">
        <main>
            <header>
                <h1 class="index_title">List of Cellars</h1>
            </header>

            <button class="button">
                <Link :href="route('cellar.create')">
                    Add Cellar
                </Link>
            </button>

            <section class="column gap_20">
                <ul v-if="!isEmpty(cellars)" class="grid_square_horiz">
                    <li class="grid_sq_insert" v-for="(cellar, index) in cellars" :key="cellar.id">
                        <CellarDisplayBox :cellar="cellar" />
                    </li>
                </ul>
            </section>
            
        </main>
    </div>
</template>
  
<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import CellarDisplayBox from "@/Components/CellarDisplayBox.vue";

export default {
    name: 'CellarsView',
    props: ['cellars', 'collection', 'user'],
    components: {
        CellarDisplayBox,
        Head,
        Link
    },
    layout: MainLayout,
    methods: {
        formatCreatedAt(date) {
        const formattedDate = new Date(date).toLocaleDateString();
        return formattedDate;
        },
        isEmpty(obj) {
                return Object.keys(obj).length === 0;
            }
    }
}
</script>
  //keep
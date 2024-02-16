<template>
    <Head title="Dashboard" />
          
    <div class="bckgd">
        <section class="background_blobs">
            <figure class="fig_bg">
                <img src="@/../assets/img/blob_top.svg" class="coral_blob_bg" alt="">    
            </figure>
        </section>
        
        <main>
            <header>
                <h2 class="block-font coral">Welcome, {{ user.first_name }}</h2>
            </header>

            <ul class="column_index_list">

                <!-- --------------- * CELLARS * ------------------ -->
                <li>
                    <!-- <section class="container_dashboard_section"> -->
                    <section class="column gap_20">
                        <header>
                            <span class="row_els_apart gap_20">
                                <h5 class="display-font cream">my cellars</h5>
                                <div>
                                    <Link v-if="cellars.length > 3" class="lien_sml cream block-font" :href="route('cellar.index')">See more</Link>
                                </div>
                            </span>
                        </header>

                        <ul v-if="!isEmpty(cellars)" class="grid_square_horiz">
                            <!-- Utilisez v-for pour afficher les 3 premières caves -->
                            <li class="grid_sq_insert" v-for="(cellar, index) in cellars.slice(0, 3)" :key="cellar.id">
                                <CellarDisplayBox :cellar="cellar" />
                            </li>
                        </ul>

                        <p class="no_show" v-else><strong>OH NO!</strong> You have no cellars yet.</p>
                        <!-- <div v-if="cellars.length > 3">
                            <Link class="button sml" :href="route('cellar.index')">See more</Link>
                        </div> -->
                    </section>
                </li>

                <!-- --------------- * WINES * ------------------ -->
                <li>
                    <section class="column gap_20">
                        <header>
                            <span class="row_els_apart gap_20">
                                <h5 class="display-font cream">my wine collection</h5>
                                <!-- <div v-if="collection.length > 3"> -->
                                <div>
                                    <Link v-if="collection.length > 3" class="lien_sml cream block-font" :href="route('collection')">See more</Link>
                                </div>
                            </span>
                        </header>

                        <div v-if="collection.length !== 0">
                            <ul class="wine-list">
                            <WineThumbnail v-for="(wine, i) in collection.slice(0, 3)"
                                :key="i"
                                :wine="wine.wine"
                                :quantities="wine.quantities"
                            />
                            </ul>
                        </div>

                        <!-- <ul v-if="!isEmpty(collection)" class="grid_square_horiz">
                            <li v-for="(wine, index) in collection.slice(0, 3)" :key="wine.id">
                                
                                <WineThumbnail v-for="(wine, i) in collection"
                                    :key="i"
                                    :wine="wine.wine"
                                    :quantities="wine.quantities"
                                />
                            </li>
                        </ul> -->

                        <!-- <WineThumbnail :wine="wine" /> -->

                        <p class="no_show" v-else><strong>OH NO!</strong> You have no wines yet.</p>
                   
                    </section>
                </li>
                <!-- <li>
                    <section class="container_dashboard_section">
                        <h5 class="display-font">My Shopping Lists</h5>
                    </section>
                </li> -->
                <!-- <li>
                    <section class="container_dashboard_section">
                        <h5 class="display-font">My Notes</h5>
                    </section>
                </li> -->
            </ul>
        </main>
    </div>  
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import CellarDisplayBox from "@/Components/CellarDisplayBox.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import WineThumbnail from "@/Components/WineThumbnail.vue";

export default {
    name: "DashboardView",
    components: {
        CellarDisplayBox,
        Head,
        Link,
        WineThumbnail,
    },
    layout: MainLayout,
    methods: {
        logout() {
            Inertia.post(route("logout"));
        },
        isEmpty(obj) {
            return Object.keys(obj).length === 0;
        },
    },
    props: ['cellars', 'collection', 'user'],
};
</script>

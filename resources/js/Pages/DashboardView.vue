<template>
    <Head title="Dashboard" />

    <div class="bckgd">
        <main>
            <header>
                <!-- EXEMPLE POUR ACCEDER AUX TRADUCTIONS -->
                <h1 class="title_index">
                    {{ __("dashboard.welcome") }}, {{ user.first_name }}
                </h1>

                <aside class="column_20">
                    <!-- ---- * Rechercher un vin * ---- -->
                    <span class="search-dashboard">
                        <SearchBar class="search-dashboard"/>
                    </span>

                    <!-- ---- * Custom wine * ---- -->
                    <button class="button btn-cream">
                        <Link :href="route('wine.create')">
                            {{ __("buttons.add_custom_wine") }}
                        </Link>
                    </button>
                </aside>
            </header>           

            <ul class="column_40">
                <!-- --------------- * CELLARS * ------------------ -->
                <li>
                    <section class="column_30">
                        <header>
                            <span class="row_els_apart gap_20">
                                <h2 class="title_disp_subt">
                                    {{ __("dashboard.my_cellars") }}
                                </h2>
                                <div>
                                    <Link
                                        v-if="cellars.length > 3"
                                        class="lien_sml cream_lt typo-block-font"
                                        :href="route('cellar.index')"
                                        >{{ __("buttons.see_more") }}
                                    </Link>
                                </div>
                            </span>
                        </header>

                        <CellarListing :cellars="cellars" :limit="3" />
                    </section>
                </li>

                <!-- --------------- * WINES * ------------------ -->
                <li>
                    <section class="column_30">
                        <header>
                            <span class="row_els_apart gap_20">
                                <h2 class="title_disp_subt">
                                    {{ __("dashboard.my_wines") }}
                                </h2>

                                <!-- ---- * "See More" link si pertinent * ---- -->
                                <div>
                                    <Link
                                        v-if="collection.length > 3"
                                        class="font_link plain cream"
                                        :href="route('collection')"
                                        >{{ __("buttons.see_more") }}</Link
                                    >
                                </div>
                            </span>
                        </header>

                        <!-- ---- * "Si existent, grille + vins * ---- -->
                        <div v-if="collection.length !== 0">
                            <ul class="wine-list">
                                <WineThumbnail
                                    v-for="(wine, i) in collection.slice(0, 3)"
                                    :key="i"
                                    :wine="wine.wine"
                                />
                            </ul>
                        </div>

                        <!-- ---- * Message "No Wine" si pertinent * ---- -->
                        <p class="auto_msg_no_show" v-else>
                            <strong>{{ __("dialogue.oh") }}</strong
                            >{{ __("dialogue.no_wine") }}.
                        </p>
                    </section>
                </li>
            </ul>
        </main>
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import CellarListing from "@/Components/CellarListing.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import SearchBar from "@/Components/SearchBar.vue";
import WineThumbnail from "@/Components/WineThumbnail.vue";
export default {
    name: "DashboardView",
    components: {
        CellarListing,
        Head,
        Link,
        SearchBar,
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
    props: ["cellars", "collection", "user"],
};
</script>

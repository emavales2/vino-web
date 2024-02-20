<template>
  <Head title="Dashboard" />

  <div class="bckgd">

    <main>
      <header>
        <h1 class="index_title">Welcome, {{ user.first_name }}</h1>
      </header>

      <button class="button">
        <Link :href="route('wine.create')">
        Add a custom wine
        </Link>
      </button>

      <ul class="column_30">

        <!-- --------------- * CELLARS * ------------------ -->
        <li>
          <section class="column_20">
            <header>
              <span class="row_els_apart gap_20">
                <h2 class="disp_subtitle">my cellars</h2>
                <div>
                  <Link v-if="cellars.length > 3" class="lien_sml cream block-font" :href="route('cellar.index')">See more
                  </Link>
                </div>
              </span>
            </header>

            <CellarListing 
              :cellars="cellars" 
              :limit="3" 
            />

          </section>
        </li>

        <!-- --------------- * WINES * ------------------ -->
        <li>
          <section class="column gap_20">
            <header>
              <span class="row_els_apart gap_20">
                <h2 class="disp_subtitle">my wine collection</h2>
                <div>
                  <Link v-if="collection.length > 3" class="lien_sml cream block-font" :href="route('collection')">See
                  more</Link>
                </div>
              </span>
            </header>

            <div v-if="collection.length !== 0">
              <ul class="wine-list">
                <WineThumbnail v-for="(wine, i) in collection.slice(0, 3)" :key="i" :wine="wine.wine"
                  :quantities="wine.quantities" />
              </ul>
            </div>

            <p class="no_show" v-else><strong>OH NO!</strong> You have no wines yet.</p>

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
import WineThumbnail from "@/Components/WineThumbnail.vue";

export default {
  name: "DashboardView",
  components: {
    CellarListing,
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

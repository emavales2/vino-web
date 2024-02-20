<template>
  <Head title="Cellars" />

  <div class="bckgd bckgd-burg">
    <main>
      <header>
        <h1 class="index_title">List of Cellars</h1>
      </header>

      <button class="button">
        <Link :href="route('cellar.create')">Add Cellar</Link>
      </button>

      <CellarListing
        :cellars="cellars"
        :limit="0"
      />

    </main>
  </div>
</template>
  
<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import CellarListing from '@/Components/CellarListing.vue';

export default {
  name: 'CellarsView',
  props: ['cellars'],
  components: {
    Head,
    Link,
    CellarListing
},
  layout: MainLayout
}
</script>

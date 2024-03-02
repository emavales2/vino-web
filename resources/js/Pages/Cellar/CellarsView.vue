<template>
  <Head title="Cellars" />

  <div class="bckgd bckgd-burg">
    <main>
      <header class="column_15">
        <h1 class="title_index">{{ __('cellar.list') }}</h1>
        <button class="button btn-cream">
            <Link :href="route('cellar.create')">{{ __('cellar.add') }}</Link>
        </button>
      </header>     

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

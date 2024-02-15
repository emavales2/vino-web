<template>
  <Head title="Collection" />
  <main>
    <section>
      <h1 class="coral">Your Wines</h1>
      <div v-if="collection.length !== 0">
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in collection"
            :key="i"
            :wine="wine.wine"
            :quantities="wine.quantities"
          />
        </ul>
      </div>
      <div class="cream" v-else>
        <p>You have no wines yet.</p>
        <Link class="button" :href="route('wine.create')">Add custom wine</Link>

      </div>
    </section>
  </main>
</template>
<script> 
import { Head, Link } from "@inertiajs/inertia-vue3";
import WineThumbnail from '@/Components/WineThumbnail.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
  name: 'CollectionView',
  components: {
    Head,
    Link,
    WineThumbnail
  },
  layout: MainLayout,
  props: ['collection']
}
</script>

<template>
  <main>
    <section class="cream">
      <h1>There is {{ count }} results for <strong>{{ search }}</strong></h1>
      <div v-if="results.length !== 0">
        <p v-if="count > 1000">there is too many search results, here is the first 1000</p>
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in results"
            :key="i"
            :wine="wine"
          />
        </ul>
      </div>
      <div v-else>
        <p>You can always create your custom wine !</p>
        <Link class="button sml" :href="route('wine.create')">Create your wine</Link>
      </div>
    </section>
  </main>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import { Link } from '@inertiajs/inertia-vue3';
export default{
  name:'Wine.SearchView',
  components: {
    Link,
    WineThumbnail
  },
  layout: MainLayout,
  props: ['results','search', 'count']
}
</script>
  
  
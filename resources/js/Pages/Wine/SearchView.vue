<template>
  <main>
    <section>
      <h1 class="title_index">{{ __('dialogue.found') }} {{ count }} {{ __('dialogue.result') }} "{{ search }}"</h1>
      <div v-if="results.length !== 0">
        <p v-if="count > 1000">{{ __('dialogue.too_many') }}</p>
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in results"
            :key="i"
            :wine="wine"
          />
        </ul>
      </div>
      <div v-else>
        <p>{{ __('dialogue.create') }}</p>
        <Link class="button btn-sml btn-coral" :href="route('wine.create')">{{ __('dialogue.create_wine') }}</Link>
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
  
  
<template>
  <Head title="Cellar" />
  <div>
    <h1>{{ cellar.name }}</h1>
    <ul class="flex flex-wrap g-3">
      <WineThumbnail v-for="(wine, i) in collection" :key="i" :wine="wine"/>
    </ul>
    <div>
      <Link :href="route('cellar.edit', cellar.id)">Edit cellar</Link>
      <button type="button" @click="redirectToDelete(cellar.id)">Delete</button>
    </div>
  </div>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import WineThumbnail from '@/Components/WineThumbnail.vue';

export default {
  name: 'ShowView',
  components: {
    Head,
    WineThumbnail,
    Link
  },
  props: {
    cellar: {
      type: Object,
    },
    collection: {
      type: Object
    }
  },
    methods: {
      redirectToEdit(cellarId) {
        this.$inertia.visit(route('cellar.edit', { id: cellarId }));
      },
      redirectToDelete() {
        if (confirm('Are you sure you want to delete this cellar?')) {
          this.$inertia.delete(route('cellar.delete', { cellar: this.cellar }));
        }
      }
    }
}
</script>

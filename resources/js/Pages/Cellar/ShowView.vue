<template>
  <Head title="Cellar" />
  <div>
    <h1>{{ cellar.name }}</h1>
    <ul class="wine-list">
      <WineThumbnail v-for="(wine, i) in collection" 
        :key="i" 
        :wine="wine.wine"
        :cellar="cellar"
        :quantity="wine.qty"
        :addOne="addOne"
        :removeOne="removeOne"
      />
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
import { Inertia } from '@inertiajs/inertia';
import WineThumbnail from '@/Components/WineThumbnail.vue';

export default {
  name: 'ShowView',
  components: {
    Head,
    WineThumbnail,
    Link
  },
  methods: {
    redirectToDelete() {
      if (confirm('Are you sure you want to delete this cellar?')) {
        this.$inertia.delete(route('cellar.delete', { cellar: this.cellar }));
      }
    },
    removeOne (wine, quantity) {
      if(quantity > 0)
        Inertia.get(route('cellarwine.remove', {cellar:this.cellar, wine:wine} ))
    },
    addOne (wine) {
      Inertia.get(route('cellarwine.add', {cellar:this.cellar, wine:wine} ))
    }
  },
  props:['cellar', 'collection']
}
</script>

<template>
    <Head title="Cellar" />
    <div>
      <header class="index_title">
        <h2>{{ cellar.name }}</h2>
        <div class="row">
          <Link :href="route('cellar.edit', cellar.id)" class="button sml">Edit cellar</Link>
          <button type="button" @click="redirectToDelete(cellar.id)" class="button sml">Delete</button>
        </div>
      </header>
      <ul class="wine-list">
        <WineThumbnail v-for="(wine, i) in collection"
          :key="i"
          :wine="wine.wine"
          :cellar="cellar"
          :quantity="wine.qty"
          :addOne="addOne"
          :removeOne="removeOne"
          :deleteWine="deleteWine"
        />
      </ul>

    </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
  name: 'ShowView',
  components: {
    Head,
    WineThumbnail,
    Link
  },
  layout: MainLayout,
  methods: {
    redirectToDelete() {
      if (confirm('Are you sure you want to delete this cellar?')) {
        this.$inertia.delete(route('cellar.delete', { cellar: this.cellar }));
      }
    },
    removeOne (wine, quantity) {
      if(quantity > 0)
        Inertia.visit(route('cellarwine.remove', {cellar:this.cellar, wine:wine} ), 
      { preserveScroll: true })
    },
    addOne (wine) {
      Inertia.visit(route('cellarwine.add', {cellar:this.cellar, wine:wine} ),
      { preserveScroll: true })
    },
    deleteWine (wine) {
      Inertia.delete(route('cellarwine.delete', {cellar:this.cellar, wine:wine}),
      { preserveScroll: true })
    }
  },
  props:['cellar', 'collection']
}
</script>

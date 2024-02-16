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
          @click="toggleModal(wine.wine.id)"
        />
      </ul>
    </div>
    <ConfirmModal 
            v-show="openDeleteModal" 
            :YesAction="delete" 
            action="delete" 
            actionMessage="Are you sure you want to delete this wine from the cellar ?" 
        />
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import ConfirmModal from '@/Components/ConfirmModal.vue';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
  name: 'ShowView',
  components: {
    ConfirmModal,
    Head,
    WineThumbnail,
    Link
  },
  data() {
    return {
      openDeleteModal: false,
      wineId: null
    }
  },
  layout: MainLayout,
  methods: {
    redirectToDelete() {
      if (confirm('Are you sure you want to delete this cellar?')) {
        this.$inertia.delete(route('cellar.delete', { cellar: this.cellar }));
      }
    },
    toggleModal(wine) {
      this.wineId = wine;
      this.openDeleteModal = !this.openDeleteModal;
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
    delete () {
      Inertia.delete(route('cellarwine.delete', {cellar:this.cellar, wine:this.wineId}),
      { preserveScroll: true })
      this.openDeleteModal = false
    }
  },
  props:['cellar', 'collection']
}
</script>

<template>
    <Head title="Cellar" />

    <div class="bckgd">
        <main>
            <GoBackButton :color="'cream'" class="button_back"/>

            <header>
                <h1 class="index_title">{{ cellar.name }}</h1>

                <section class="row_els_apart">
                    <Link :href="route('cellar.edit', cellar.id)" class="button sml">Edit cellar</Link>
                    <button type="button" @click="redirectToDelete(cellar.id)" class="button sml">Delete</button>
                </section>
            </header>

            <ul class="wine-list">

                <WineThumbnail v-for="(wine, i) in collection"
                  :key="i"
                  :wine="wine.wine"
                  :cellar="cellar"
                  :quantity="wine.qty"
                >
                  <!-- section std(sloté dans WineThumbnail), inclus btns - et + ainsi que btn remove -->
                  <section>
                    <div>
                      <MinusButton 
                        :color="'cream'" 
                        :disabled="wine.qty === 0" 
                        @click="removeOne(wine.wine, wine.qty)"
                      />
                      <PlusButton 
                        :color="'cream'" 
                        @click="addOne(wine.wine)"
                      />
                    </div>
                    <button class="button sml" @click="toggleModal(wine.wine)">remove wine</button>
                  </section>
                  
                </WineThumbnail>
            </ul>
        </main>
    </div>

    <ConfirmModal 
      v-show="openDeleteModal" 
      :YesAction="delete" 
      action="delete" 
      :toggleModal="toggleModal"
      actionMessage="Are you sure you want to delete this wine from the cellar ?" 
    />
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import PlusButton from '@/Components/ButtonsIcons/PlusButton.vue';
import MinusButton from '@/Components/ButtonsIcons/MinusButton.vue';
import ConfirmModal from '@/Components/ConfirmModal.vue';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';

export default {
  name: 'ShowView',
  components: {
    ConfirmModal,
    Head,
    WineThumbnail,
    GoBackButton,
    Link,
    PlusButton,
    MinusButton
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
      console.log(wine)
      this.openDeleteModal = !this.openDeleteModal;
    },
    removeOne (wine, quantity) {
      if(quantity > 0)
        Inertia.visit(route('cellarwine.remove', {cellar: this.cellar, wine: wine }), 
      { preserveScroll: true })
    },
    addOne (wine) {
      Inertia.visit(route('cellarwine.add', {cellar: this.cellar, wine: wine }),
      { preserveScroll: true })
    },
    delete () {
      Inertia.delete(route('cellarwine.delete', {cellar: this.cellar, wine: this.wineId }),
      { preserveScroll: true })
      this.openDeleteModal = false
    }
  },
  props:['cellar', 'collection']
}
</script>

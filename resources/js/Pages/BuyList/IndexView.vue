<template>
    <Head title="Buy List" />

    <div class="bckgd bckgd-burg">
        
        <main>
            <header>
                <h1 class="index_title">Shopping List</h1>
            </header>

            <div v-if="buylist.length !== 0">
                <ul class="wine-list">
                <WineThumbnail v-for="(wine, i) in buylist" 
                  :key="i" 
                  :wine="wine"
                  :quantity="wine.quantity"
                >
                <section>
                    <div>
                      <MinusButton 
                        :color="'cream'" 
                        :disabled="wine.quantity === 0" 
                        @click="removeOne(wine, wine.quantity)"
                      />
                      <PlusButton 
                        :color="'cream'" 
                        @click="addOne(wine)"
                      />
                    </div>
                    <button class="button sml" @click="toggleModal(wine)">remove wine</button>
                  </section>
                </WineThumbnail>
                </ul>
            </div>

            <div v-else>
                <p class="cream">Your shopping list is empty.</p>
            </div>
        </main>
    </div>
    <ConfirmModal 
      v-show="openDeleteModal" 
      :YesAction="delete" 
      action="delete" 
      :toggleModal="toggleModal"
      actionMessage="Are you sure you want to delete this wine from your buy list ?" 
    />
</template>
  
<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import MainLayout from '@/Layouts/MainLayout.vue';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import PlusButton from '@/Components/ButtonsIcons/PlusButton.vue';
import MinusButton from '@/Components/ButtonsIcons/MinusButton.vue';
import ConfirmModal from '@/Components/ConfirmModal.vue';

export default {
  components: {
    WineThumbnail,
    Head,
    Link,
    MinusButton,
    PlusButton,
    ConfirmModal
  },
  data() {
    return {
      openDeleteModal: false,
      wineId: null
    }
  },
  layout: MainLayout,
  methods: {
    toggleModal(wine) {
      this.wineId = wine;
      this.openDeleteModal = !this.openDeleteModal;
    },
    removeOne (wine, quantity) {
      if(quantity > 0)
        Inertia.visit(route('buylist.remove', { wine: wine }), 
      { preserveScroll: true })
    },
    addOne (wine) {
      Inertia.visit(route('buylist.add', { wine: wine }),
      { preserveScroll: true })
    },
    delete () {
      Inertia.delete(route('buylist.delete', { wine: this.wineId }),
      { preserveScroll: true })
      this.openDeleteModal = false
    }
  },
  props: ['buylist']
}
</script>
  
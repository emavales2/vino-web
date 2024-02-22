<template>
    <Head title="Buy List" />

    <div class="bckgd bckgd-burg">
        
        <main>
            <header>
                <h1 class="index_title">{{ __('cellar.buylist') }}</h1>
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
<!--                       <MinusButton 
                        :color="'cream'" 
                        :disabled="wine.quantity === 0" 
                        @click="removeOne(wine, wine.quantity)"
                      />
                      <PlusButton 
                        :color="'cream'" 
                        @click="addOne(wine)"
                      /> -->
                    </div>
                    <button class="button sml" @click="toggleModal(wine)">{{ __('buttons.remove') }}</button>
                  </section>
                </WineThumbnail>
                </ul>
            </div>

            <div v-else>
                <p class="cream">{{ __('cellar.no_list') }}</p>
            </div>
        </main>
    </div>
  
    <Modal 
      v-show="openDeleteModal"
      :toggleOff="toggleModal"
    >
      <ConfirmModal
        :YesAction="deleteWine"
        action="delete"
        :toggleModal="toggleModalWine"
        :actionMessage="message"
      />
      <!-- <BuyListToCellar
        v-if="wineId"
        :wine="wineId"
        :cellars="cellars"
      /> -->
    </Modal>
</template>
  
<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import MainLayout from '@/Layouts/MainLayout.vue';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import PlusButton from '@/Components/ButtonsIcons/PlusButton.vue';
import MinusButton from '@/Components/ButtonsIcons/MinusButton.vue';
import ConfirmModal from '@/Components/ConfirmModal.vue';
import BuyListToCellar from '@/Components/BuyListToCellar.vue';
import Modal from '@/Components/Modal.vue';
export default {
  components: {
    WineThumbnail,
    Head,
    Link,
    MinusButton,
    PlusButton,
    ConfirmModal,
    Modal,
    BuyListToCellar
  },
  data() {
    return {
      openDeleteModal: false,
      wineId: null,
      message: null
    }
  },
  layout: MainLayout,
  methods: {
    toggleModal(wine) {
      this.message = 'do you want to store the bottles in a cellar?';
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
/*     delete () {
      Inertia.delete(route('buylist.delete', { wine: this.wineId }),
      { preserveScroll: true })
      this.openDeleteModal = false
    } */
  },
  props: ['buylist', 'cellars']
}
</script>
  
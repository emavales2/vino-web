<template>
    <Head title="Buy List" />

    <div class="bckgd bckgd-burg">
        
        <main>
            <header>
                <h1 class="title_index">{{ __('cellar.buylist') }}</h1>
            </header>
            <div v-if="buylist.length !== 0">
                <ul class="wine-list">
                <WineThumbnail v-for="(wine, i) in buylist" 
                  :key="i" 
                  :wine="wine.newWine"
                  :quantity="wine.quantity"
                >
                <section>
                    <div>
                    </div>
                    <button class="button btn-full btn-sml btn-coral" @click="toggleModal(wine)">{{ __('buttons.remove') }}</button>
                  </section>
                </WineThumbnail>
                </ul>
            </div>

            <div v-else>
                <p class="auto_msg_no_show">{{ __('cellar.no_list') }}</p>
            </div>
        </main>
    </div>
  
    <Modal 
      v-show="openDeleteModal"
      :toggleOff="toggleModal"
    >
      <BuyListToCellar
        v-if="wineId"
        :toggleModal="toggleModal"
        :openDialog="this.$parent.openDialog"
        :yesMessage="__('actions.store')"
        :noMessage="__('buylist.just_delete')"
        :actionMessage="__('buylist.store_in_cellar')"
        :wine="wineId"
        :cellars="cellars"
      />
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
    }
  },
  props: ['buylist', 'cellars']
}
</script>
  
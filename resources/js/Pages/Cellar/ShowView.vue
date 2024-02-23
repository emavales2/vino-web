<template>
  <Head title="Cellar" />

  <div class="bckgd">
      <main>
          <GoBackButton :color="'cream'" class="button_back" />

          <header>
              <h1 class="index_title">{{ cellar.name }}</h1>

              <section class="row_els_apart">
                  <Link
                      :href="route('cellar.edit', cellar.id)"
                      class="button sml"
                      >{{ __("buttons.edit") }}</Link
                  >
                  <button
                      type="button"
                      @click.stop="toggleModal(cellar)"
                      class="button sml"
                  >
                      {{ __("buttons.delete") }}
                  </button>
              </section>
              <SearchAuto 
                :cellars="collection"
                :collection="collectionReceived"
                @collection-event="receiveTreatedCollection"
                v-if="collection.length !== 0"
              />
          </header>

          <ul class="wine-list" v-if="collectionReceived.length !== 0">
              <WineThumbnail
                  v-for="(wine, i) in collectionReceived"
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
                              @click.stop="removeOne(wine.wine, wine.qty)"
                          />
                          <PlusButton
                              :color="'cream'"
                              @click.stop="addOne(wine.wine)"
                          />
                      </div>
                      <button
                          class="button sml"
                          @click.stop="toggleModalWine(wine.wine, cellar.id)"
                      >
                          {{ __("buttons.delete") }}
                      </button>
                  </section>
              </WineThumbnail>
          </ul>
          <div v-else>
            <p class="cream" v-if="term">{{ __('dialogue.no_term') }} <strong>{{ term }}</strong>.</p>
            <p class="cream" v-else>{{ __('dialogue.no_wine') }}</p>
          </div>
          
      </main>
  </div>
  <Modal v-show="openDeleteModal" :toggleOff="toggleModal">
      <!-- // Modal pour la suppression d'un vin -->
      <ConfirmModal
              :YesAction="deleteWine"
              action="delete"
              :toggleModal="toggleModalWine"
              :actionMessage="message"
          />
  </Modal>
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
import Modal from '@/Components/Modal.vue';
import SearchAuto from '@/Components/SearchAuto.vue';

export default {
name: 'ShowView',
components: {
  ConfirmModal,
  Modal,
  Head,
  WineThumbnail,
  GoBackButton,
  Link,
  PlusButton,
  MinusButton,
  SearchAuto
},
data() {
  return {
    openDeleteModal: false,
    cellarId: null,
    message: null,
    wineId: null,
    collectionReceived: this.collection || [],
    term: null
  }
},
watch: {
  collectionReceived() {
    this.filteredCollection = this.collectionReceived.filter(wine => !this.collection.includes(wine));
  },
},
layout: MainLayout,
methods: {
  toggleModal(cellar) {
    this.message = this.trans.dialogue.show_view;
    this.cellarId = cellar;
    this.openDeleteModal = !this.openDeleteModal;
  },
  toggleModalWine(wine, cellar) {
    this.message = this.trans.dialogue.show_view_wine;
    this.cellarId = cellar;
    this.wineId = wine;
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
    Inertia.delete(route('cellar.delete', {cellar: this.cellar }),
    { preserveScroll: true })
    this.openDeleteModal = false
  },
  deleteWine () {
    Inertia.delete(route('cellarwine.delete', {cellar: this.cellar, wine: this.wineId }),
    { preserveScroll: true })
    this.openDeleteModal = false
  },
  receiveTreatedCollection(data) {
    this.collectionReceived = data.myCollection;
    this.term = data.term;
  }
},
props:['cellar', 'collection', 'trans']
}
</script>

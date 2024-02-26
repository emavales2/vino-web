<template>
  <Head title="Cellar" />

  <div class="bckgd">
    <main>
      <GoBackButton :color="'cream'" />

      <!-- ---- * Titre et boutons qui affecten le cellier * ---- -->
      <header>
        <h1 class="title_index">{{ cellar.name }}</h1>
        <section>
          <Link :href="route('cellar.edit', cellar.id)" class="btn_link cream">{{ __("buttons.edit") }}</Link>
          <button type="button" @click.stop="toggleModal(cellar)" class="btn_link cream">
            {{ __("cellar.cellar_delete") }}
          </button>
        </section>
      </header>

      <!-- ---- * SECTION RECHERCHE/FILTRES/TRI * ---- -->
      <aside v-if="collection.length !== 0 || searchTerm" class="card_nav bckgd-burg-lt">
        <h2 class="title_disp_subt tit_sub_sm">
          {{ __("cellar.more_options") }}
        </h2>

        <!-- ---- * Rechercher un vin dans ce cellier * ---- -->
        <SearchAuto :cellars="collection" :collection="collectionReceived" @collection-event="receiveTreatedCollection"
          v-if="collection.length !== 0" />

        <!-- ---- * Filtres * ---- -->
        <span class="row_els_apart">
          <button class="button button-sml btn_wide">{{ __("cellar.filter") }}</button>

          <!-- ---- * Tri * ---- -->
          <button class="button button-sml btn_wide" @click="toggleSortSquare">{{ __("cellar.sort") }}</button>
        </span>

        <transition name="sort-square-fade">
          <section v-show="isSortSquareOpen" class="sort-square">
            <h1 class="fs_6 display-font coral">{{ __('cellar.sort_by') }}</h1>
            <div class="sort-square-options">
              <div>
                <input type="radio" class="radio" name="sort" id="type" v-model="sort" :value="1">
                <label for="type">{{ __('cellar.wine_type') }}</label>
              </div>
              <div>
                <input type="radio" class="radio" name="sort" id="country" v-model="sort" :value="2">
                <label for="country">{{ __('cellar.wine_country') }}</label>
              </div>
              <div>
                <input type="radio" class="radio" name="sort" id="price" v-model="sort" :value="3">
                <label for="price">{{ __('cellar.wine_price') }}</label>
              </div>
            </div>
          </section>
        </transition>
      </aside>

      <ul class="wine-list" v-if="collectionReceived.length !== 0">
        <WineThumbnail v-for="(wine, i) in collectionReceived" :key="i" :wine="wine.wine" :cellar="cellar"
          :quantity="wine.qty">
          <!-- section std(sloté dans WineThumbnail), inclus btns - et + ainsi que btn remove -->
          <section class="wine_thb_nav">
            <span>
              <MinusButton :color="'coral'" :disabled="wine.qty === 0" @click.stop="removeOne(wine.wine, wine.qty)" />
              <PlusButton :color="'coral'" @click.stop="addOne(wine.wine)" />

            </span>
            <button class="button btn-sml btn-full btn-warning" @click.stop="toggleModalWine(wine.wine, cellar.id)">
              {{ __("buttons.remove") }}
            </button>
          </section>
        </WineThumbnail>
      </ul>
      <div v-else>
        <p class="cream" v-if="searchTerm">{{ __('dialogue.no_term') }} <strong>{{ searchTerm }}</strong>.</p>
        <p class="cream" v-else>{{ __('dialogue.no_wine') }}</p>
      </div>

    </main>
  </div>
  <Modal v-show="openDeleteModal" :toggleOff="toggleModal">
    <!-- // Modal pour la suppression d'un vin -->
    <ConfirmModal :YesAction="action" action="delete" :toggleModal="toggleModalWine" :actionMessage="message" />
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
      collectionReceived: this.collection,
      searchTerm: null,
      action: null,
      isSortSquareOpen: false,
      sort: 0
    }
  },
  watch: {
    collectionReceived() {
      this.filteredCollection = this.collectionReceived.filter(wine => !this.collection.includes(wine));
    },
    collection() {
      this.collectionReceived = this.collection;
    },
    sort() {
      this.sortCollection(this.sort);
    }
  },
  layout: MainLayout,
  methods: {
    toggleModal(cellar) {
      this.message = this.trans.dialogue.show_view;
      this.cellarId = cellar;
      this.action = this.deleteAllWine;
      this.openDeleteModal = !this.openDeleteModal;
    },
    toggleModalWine(wine, cellar) {
      this.message = this.trans.dialogue.show_view_wine;
      this.cellarId = cellar;
      this.wineId = wine;
      this.action = this.deleteWine;
      this.openDeleteModal = !this.openDeleteModal;
    },
    removeOne(wine, quantity) {
      if (quantity > 0)
        Inertia.visit(route('cellarwine.remove', { cellar: this.cellar, wine: wine }),
          { preserveScroll: true })
    },
    addOne(wine) {
      Inertia.visit(route('cellarwine.add', { cellar: this.cellar, wine: wine }),
        { preserveScroll: true })
    },
    delete() {
      Inertia.delete(route('cellar.delete', { cellar: this.cellar }),
        { preserveScroll: true })
      this.openDeleteModal = false
    },
    deleteAllWine() {
      Inertia.delete(route('cellarwine.deleteallwine', { cellar: this.cellar }),
        { preserveScroll: true })
      this.openDeleteModal = false
    },
    deleteWine() {
      Inertia.delete(route('cellarwine.delete', { cellar: this.cellar, wine: this.wineId }),
        { preserveScroll: true })
      this.openDeleteModal = false
    },
    receiveTreatedCollection(data) {
      this.collectionReceived = data.myCollection;
      this.searchTerm = data.term;
    },
    toggleSortSquare() {
      this.isSortSquareOpen = !this.isSortSquareOpen;
    },
    sortCollection(option) {
      if (option != 0) {
        this.collectionReceived.sort((a, b) => {
          if (option == 1) {
            const typeA = a.wine.type;
            const typeB = b.wine.type;
            return typeA.localeCompare(typeB);
          }

          if (option == 2) {
            const countryA = a.wine.country;
            const countryB = b.wine.country;
            return countryA.localeCompare(countryB);
          }
          
          if (option == 3) {
            const priceA = a.wine.price;
            const priceB = b.wine.price;
            return priceA - priceB;
          }
        });
      }
    },
  },
  props: ['cellar', 'collection', 'trans']
}
</script>

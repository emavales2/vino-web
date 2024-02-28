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
          <!-- Le btn delete ne s'affiche pas si le cellier est le seul -->
          <button v-if="(numCellars !== 1)" type="button" @click.stop="toggleModal(cellar)" class="btn_link cream">
            {{ __("cellar.cellar_delete") }}
          </button>
        </section>
      </header>

      <!-- ---- * SECTION RECHERCHE/FILTRES/TRI * ---- -->

      <!-- If I make it into a component, will add back the v-if maybe? -->
      <!-- <aside v-if="collection.length !== 0 || searchTerm" class="card_nav bckgd-burg-lt"> -->

    <!-- ---- * SECTION SEARCH / TRI / FILTRES COMMENCE * ---- -->    
    <aside class="card_nav bckgd-burg-lt">
        <h2 class="title_disp_subt tit_sub_sm">
            {{ __("cellar.more_options") }}
        </h2>

        <!-- ---- * Rechercher un vin dans ce cellier * ---- -->
        <SearchAuto :cellars="collection" :collection="collectionReceived" @collection-event="receiveTreatedCollection" v-if="collection.length !== 0" />

        <!-- ---- * Boutons Filtres / Tri * ---- -->
        <span class="row_els_apart">
<<<<<<< HEAD
          <button class="button button-sml btn-cream btn_wide">{{ __("cellar.filter") }}</button>

          <!-- ---- * Tri * ---- -->
          <button class="button button-sml btn-cream btn_wide" @click="toggleSortSquare">{{ __("cellar.sort") }}</button>
=======
            <button class="button button-sml btn_wide">{{ __("cellar.filter") }}</button>

            <button class="button button-sml btn_wide" @click="toggleSortSquare">{{ __("cellar.sort") }}</button>
>>>>>>> 52fa2c93c61a33b406b7bbe8e1eb2526858e3cdf
        </span>

        <!-- ---- * Depliant Tri * ---- -->
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

<!-- ---- * TESTING FILTERS * ---- -->
    <section>
        <h1 class="fs_6 display-font coral">Filter by</h1>
  
        <div class="column_10 cream">
            
            <span>
                <label for="filterByType">Type</label>                     
                <select id="filterByType" v-model="filters.type" @change="filterCollection" ref="filterByType">
                    <option value="">All Wine Types</option>
                    <option v-for="type in wineTypes" :value="type">{{ type }}</option>
                </select>
            </span>

            <span>
                <label for="filterByCountry">Country</label>                     
                <select id="filterByCountry" v-model="filters.country" @change="filterCollection">
                    <option value="">All Countries</option>
                    <option v-for="country in wineCountries" :value="country">{{ country }}</option>
                </select>
            </span>

            <span>
                <label for="filterBySize">Size</label>                     
                <select id="filterBySize" v-model="filters.size" @change="filterCollection">
                    <option value="">All Wine Sizes</option>
                    <option v-for="size in wineSizes" :value="size">{{ size }}</option>
                </select>
            </span>

            <span>
                <label for="minPrice">Min Price</label>                     
                <input type="number" id="minPrice" v-model="filters.minPrice">

                <label for="maxPrice">Max Price</label>                     
                <input type="number" id="maxPrice" v-model="filters.maxPrice">

                <button @click="filterCollection">Filter Price</button>
            </span>
        </div>
    </section>

    <!-- ---- * FIN TESTING FILTERS * ---- -->



      <ul class="wine-list" v-if="collectionReceived.length !== 0">
        <WineThumbnail v-for="(wine, i) in collectionReceived" :key="i" :wine="wine.wine" :cellar="cellar"
          :quantity="wine.qty">
          <!-- section std(sloté dans WineThumbnail), inclus btns - et + ainsi que btn remove -->
          <section class="wine_thb_nav">
            <span>
              <MinusButton :color="'coral'" :disabled="wine.qty === 0" @click.stop="removeOne(wine.wine, wine.qty)" />
              <PlusButton :color="'coral'" @click.stop="addOne(wine.wine)" />

            </span>
            <button class="button btn-sml btn-full btn-coral" @click.stop="toggleModalWine(wine.wine, cellar.id)">
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
        sort: 0,
        filters: {
            type: null,
            country: null,
            size: null,
            price: null
        },
        wineTypes: [],
        wineCountries: [],
        wineSizes: [],
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
        { preserveScroll: true,
          onSuccess: () => {
            this.$parent.openDialog(this.__('dialogue.cellar_delete'));
          }
        })
      this.openDeleteModal = false
    },
    deleteWine() {
      Inertia.delete(route('cellarwine.delete', { cellar: this.cellar, wine: this.wineId }),
        { 
          preserveScroll: true,
          onSuccess: () => {
            this.$parent.openDialog(this.__('dialogue.cellarwine_delete'));
          }
        })
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
    // ---- * Créer arrays dynamiques pour les différents sets de filtres contenant autant de values qui existent dans le cellier. À NOTER: LE PRIX N'EST PAS INCLU ICI  * ----
    allFilters() {
        const types = [];
        const countries = [];
        const sizes = [];

        this.collection.forEach(item => {
            if (!types.includes(item.wine.type)) {
                types.push(item.wine.type);
            }
            if (!countries.includes(item.wine.country)) {
                countries.push(item.wine.country);
            }
            if (!sizes.includes(item.wine.size)) {
                sizes.push(item.wine.size);
            }
        });

        this.wineTypes = types;
        this.wineCountries = countries;
        this.wineSizes = sizes;
    },
    // ---- * Filtrer les données dans ce cellier en utilisant les options disponibles  * ----
    filterCollection() {
          let filteredList = this.collection; 
  
          if (this.filters.type) {
              filteredList = filteredList.filter(item => item.wine.type === this.filters.type);
          }  
          if (this.filters.country) {
              filteredList = filteredList.filter(item => item.wine.country === this.filters.country);
          }  
          if (this.filters.size) {
              filteredList = filteredList.filter(item => item.wine.size === this.filters.size);
          }  
          if (this.filters.minPrice && this.filters.maxPrice) {
              filteredList = filteredList.filter(item => 
              item.wine.price >= this.filters.minPrice && 
              item.wine.price <= this.filters.maxPrice);
          }
  
          this.collectionReceived = filteredList;
      },
  },
  // ---- * Appeler l'extraction des filtres * ----
  mounted() {
        this.allFilters();
    },
  props: ['cellar', 'collection', 'trans', 'wine', 'numCellars']
}
</script>

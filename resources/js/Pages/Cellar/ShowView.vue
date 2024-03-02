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
      
            <!-- ---- * SECTION RECHERCHE / FILTRES / TRI * ---- -->

            <aside class="card_nav " v-if="collection.length !== 0">
                <h2 class="title_disp_subt tit_sub_sm">
                    {{ __("cellar.more_options") }}
                </h2>

                <!-- ---- * Rechercher un vin dans ce cellier * ---- -->
                <span class="s-a-cellar">
                    <SearchAuto :cellars="collection" :collection="collectionReceived" @collection-event="receiveTreatedCollection" v-if="collection.length !== 0" />
                </span>

                <!-- ---- * Boutons Filtres / Tri * ---- -->
                <span>
                    <button :aria-label="__('cellar.filter')" class="btn_link cream" @click="toggleFilterSquare">{{ __("cellar.filter") }}</button>
                    <button :aria-label="__('cellar.sort')" class="btn_link cream" @click="toggleSortSquare">{{ __("cellar.sort") }}</button>
                </span>

                <!-- ---- * Dépliant Tri * ---- -->
                <transition name="sort-container-fade">
                    <section v-show="isSortSquareOpen" class="sort-container">
                        <!-- <h1 class="fs_6 display-font coral">{{ __('cellar.sort_by') }}</h1> -->
                        <ul class="sort-container sort-options">
                            <li>
                                <input type="radio" class="radio" name="sort" id="type" v-model="sort" :value="1">
                                <label for="type">{{ __('cellar.wine_type') }}</label>
                            </li>
                            <li>
                                <input type="radio" class="radio" name="sort" id="country" v-model="sort" :value="2">
                                <label for="country">{{ __('cellar.wine_country') }}</label>
                            </li>
                            <li>
                                <input type="radio" class="radio" name="sort" id="price" v-model="sort" :value="3">
                                <label for="price">{{ __('cellar.wine_price') }}</label>
                            </li>
                        </ul>
                    </section>
                </transition>

                <!-- ---- * Dépliant Filtre * ---- -->
                <transition name="sort-container-fade">
                    <section v-show="isFilterSquareOpen" class="sort-container">
                        <div class="column_30">
                            <section class="column_15">                                                
                                <!-- ---- * Filtre "Type" * ---- -->
                                <article class="dropdown_container"> 
                                    <header class="button">
                                        <section>
                                            <input type="checkbox" id="filterByType" class="dropdown_toggle" @click="toggleTypes">
                                            <label for="filterByType">
                                                <span>
                                                    {{ typeFilter }}
                                                    <svg class="drop_arrrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                                </span>
                                            </label>
                                        </section>
                                    </header>  

                                    <ul class="dropdown_options" @change="filterCollection" ref="filterByType" v-show="typeFilterOpen">
                                        <li>
                                            <label for="allType">{{ __('cellar.all_type') }}</label>
                                            <input type="radio" id="allType" name="type" value="" v-model="filters.type" @click="allTypes">
                                        </li> 
                                        <li v-for="type in wineTypes" :value="type">
                                            <label :for="type">{{ type }}</label>
                                            <input type="radio" :id="type" :name="type" :value="type" v-model="filters.type">
                                        </li>
                                    </ul>                               
                                </article>

                                <!-- ---- * Filtre "Pays" * ---- -->
                                <article class="dropdown_container">      
                                    <header class="button">
                                        <section>
                                            <input type="checkbox" id="filterByCountry" class="dropdown_toggle" @click="toggleCountries">
                                            <label for="filterByCountry">
                                                <span>
                                                {{ countryFilter }}
                                                <svg class="drop_arrrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                                </span>
                                            </label>
                                        </section>
                                    </header> 
                                    
                                    <ul class="dropdown_options" @change="filterCollection" ref="filterByCountry" v-show="countryFilterOpen">
                                        <li>
                                            <label for="allCountry">{{ __('cellar.all_country') }}</label>
                                            <input type="radio" id="allCountry" name="country" value="" v-model="filters.country" @click="allCountries">
                                        </li> 
                                        <li v-for="country in wineCountries" :value="country">
                                            <label :for="country">{{ country }}</label>
                                            <input type="radio" :id="country" :name="country" :value="country" v-model="filters.country">
                                        </li>
                                    </ul>                               
                                </article>

                                <!-- ---- * Filtre "Taille" * ---- -->
                                <article class="dropdown_container">      
                                    <header class="button">
                                        <section>
                                            <input type="checkbox" id="filterBySize" class="dropdown_toggle" @click="toggleSizes">
                                            <label for="filterBySize">
                                                <span>
                                                    {{ sizeFilter }}
                                                    <svg class="drop_arrrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                                </span>
                                            </label>
                                        </section>
                                    </header>  
                                    
                                    <ul class="dropdown_options" @change="filterCollection" ref="filterBySize" v-show="sizeFilterOpen">
                                        <li>
                                            <label for="allSize" @click="allSizes">{{ __('cellar.all_size') }}</label>
                                            <input type="radio" id="allSize" name="size" value="" v-model="filters.size">
                                        </li> 
                                        <li v-for="size in wineSizes" :value="size">
                                            <label :for="size" @click="filterCollection">{{ size }}</label>
                                            <input type="radio" :id="size" :name="size" :value="size" v-model="filters.size">
                                        </li>
                                    </ul>                               
                                </article>
                            </section> 

                            <!-- ---- * Filtre "Prix" * ---- -->
                            <article class="prix column_15">
                                <p>{{ __('cellar.filter_price') }}</p>
                                <span class="prix_wrapper">    
                                    <label for="minPrice">$ MIN</label>                     
                                    <input type="number" id="minPrice" v-model="filters.minPrice">
                                </span>                                    
                                <span class="prix_wrapper">
                                    <label for="maxPrice">$ MAX</label>                     
                                    <input type="number" id="maxPrice" v-model="filters.maxPrice">
                                </span>
                                <button class="button p-small" @click="filterCollection">{{ __('words.calculate')}}</button>
                            </article>
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
            isFilterSquareOpen: false,
            countryFilter: this.__('cellar.wine_country'),
            typeFilter: this.__('cellar.wine_type'),
            sizeFilter: this.__('cellar.wine_size'),
            filters: {
                type: null,
                country: null,
                size: null,
                price: null
            },
            wineTypes: [],
            wineCountries: [],
            wineSizes: [],
            typeFilterOpen: false,
            countryFilterOpen: false,
            sizeFilterOpen: false
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
        toggleFilterSquare() {
        this.isFilterSquareOpen = !this.isFilterSquareOpen;
        },
        toggleTypes() {
        this.typeFilterOpen = !this.typeFilterOpen;
        },
        closeTypes() {
            this.typeFilterOpen = false;
        },
        allTypes() {
            this.typeFilter = this.__('cellar.all_type')
            this.closeTypes()
        },
        toggleCountries() {
        this.countryFilterOpen = !this.countryFilterOpen;
        },
        closeCountries() {
            this.countryFilterOpen = false;
        },
        allCountries () {
            this.countryFilter = this.__('cellar.all_country')
            this.closeCountries()
        },
        toggleSizes() {
        this.sizeFilterOpen = !this.sizeFilterOpen;
        },
        closeSizes () {
            this.sizeFilterOpen = false
        },
        allSizes () {
            this.sizeFilter = this.__('cellar.all_size')
            this.closeSizes()
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
                this.typeFilter = this.filters.type
                this.closeTypes()
                filteredList = filteredList.filter(item => item.wine.type === this.filters.type);
            }  
            if (this.filters.country) {
                this.countryFilter = this.filters.country
                this.closeCountries()
                filteredList = filteredList.filter(item => item.wine.country === this.filters.country);
            }  
            if (this.filters.size) {
                this.sizeFilter = this.filters.size
                this.closeSizes()
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

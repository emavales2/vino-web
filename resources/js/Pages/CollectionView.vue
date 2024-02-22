<template>
    <Head title="Collection" />

    <div class="bckgd">
        <main>
            <section class="column_30">
                <header>
                    <h1 class="index_title">{{ __('cellar.your_wines') }}</h1>
                </header>

                <button class="button">
                    <Link :href="route('wine.create')">
                        {{ __('cellar.add_custom') }}
                    </Link>
                </button>
                
                <div v-if="collection.length !== 0">
                    <div>
                        <ul class="wine-list">
                            <WineThumbnail  v-for="(wine, i) in collection" 
                              :key="i"
                              :wine="wine.wine"
                              :quantities="wine.quantities"
                            >
                              <!-- section std sloté -->
                              <section>
                                <Link v-if="wine.wine.user_id"
                                  :href="route('wine.edit', wine.wine.id)" 
                                  class="button sml"
                                >
                                  edit wine
                                </Link>
                                <button class="button sml btn_wide" @click="toggleModal(wine.wine)">remove</button>
                              </section>

                            </WineThumbnail>
                        </ul>
                    </div>
                </div>

                <div class="cream" v-else>
                    <p>{{ __('dialogue.no_wine') }}</p>
                </div>
            </section>
        </main>
    </div>

    <Modal v-show="openDeleteModal"
        :toggleOff="toggleModal"
    >
        <ConfirmModal
            :YesAction="delete"
            action="delete"
            :toggleModal="toggleModal"
            :actionMessage="message"
        />
    </Modal>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from "@inertiajs/inertia-vue3";
import ConfirmModal from "@/Components/ConfirmModal.vue";
import DeleteButton from "@/Components/ButtonsIcons/DeleteButton.vue";
import EditButton from "@/Components/ButtonsIcons/EditButton.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import WineThumbnail from "@/Components/WineThumbnail.vue";
import Modal from '@/Components/Modal.vue';

export default {
    name: "CollectionView",
    components: {
        ConfirmModal,
        Modal,
        DeleteButton,
        Head,
        Link,
        MainLayout,
        WineThumbnail,
        EditButton
    },
    data() {
        return {
            openDeleteModal: false,
            wineId: null,
            message: this.trans.dialogue.delete_wine
        };
    },
    layout: MainLayout,
    methods: {
        toggleModal(wine) {
            this.wineId = wine;
            this.openDeleteModal = !this.openDeleteModal;
        },
        delete() {
          Inertia.delete(route("wine.delete", this.wineId));
          this.openDeleteModal = false
        },
    },
    props: ["collection", 'trans'],
};
</script>

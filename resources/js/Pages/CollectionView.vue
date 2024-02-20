<template>
    <Head title="Collection" />

    <div class="bckgd">
        <main>
            <section class="column_30">
                <header>
                    <h1 class="index_title">Your Wines</h1>
                </header>

                <button class="button">
                    <Link :href="route('wine.create')">
                        Add a custom wine
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
                                <button class="button sml" @click="toggleModal(wine.wine)">remove wine</button>
                              </section>

                            </WineThumbnail>
                        </ul>
                    </div>
                </div>

                <div class="cream" v-else>
                    <p>You have no wines yet.</p>
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
            actionMessage="Are you sure you want to delete this wine? This action will remove it from your cellars as well. This action cannot be undone."
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
    props: ["collection"],
};
</script>

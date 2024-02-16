<template>
    <Head title="Collection" />

    <div class="bckgd">
        <main>
            <section  class="column_index_list">
                <header>
                    <h2 class="block-font coral">Your Wines</h2>
                </header>

                <span>
                    <Link class="button" :href="route('wine.create')">Add custom wine</Link>
                </span>
                
                <div v-if="collection.length !== 0">
                    <div >
                        <ul class="wine-list">
                            <WineThumbnail
                            v-for="(wine, i) in collection" :key="i"
                                :wine="wine.wine"
                                :quantities="wine.quantities">

                                <aside class="wine-th-nav">
                                    <DeleteButton @click="toggleModal(wine.wine.id)" :color="'cream'"/> 
                                    <Link :href="route('wine.edit', wine.wine.id)">
                                        <EditButton :fill="'cream'"/>
                                    </Link>
                            </aside>
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
    <ConfirmModal 
            v-show="openDeleteModal" 
            :YesAction="delete" 
            action="delete" 
            actionMessage="Are you sure you want to delete this wine? This action will remove it from your cellars as well. This action cannot be undone." 
        />
</template>
<script>
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from "@inertiajs/inertia-vue3";
import ConfirmModal from "@/Components/ConfirmModal.vue";
import DeleteButton from "@/Components/ButtonsIcons/DeleteButton.vue";
import EditButton from "@/Components/ButtonsIcons/EditButton.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import WineThumbnail from "@/Components/WineThumbnail.vue";

export default {
    name: "CollectionView",
    components: {
        ConfirmModal,
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

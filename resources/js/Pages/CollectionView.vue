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
                                <span>
                                    <DeleteButton @click="toggleModal(wine.wine.id)" :color="'cream'"/> 
                                </span>
                                 
                                <span>
                                    <!-- <Link v-if="wine.wine.user_id !== null" class="button sml" :href="route('wine.edit', wine.wine.id)"><EditButton/> </Link>  -->

                                    <Link class="wine-btn" :href="route('wine.edit', wine.wine.id)">
                                        <figure>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path class="cls-1" d="m24.13,4.07l-3.2-3.2c-1.16-1.16-3.05-1.16-4.21,0L1.8,15.79s-.06.06-.09.1h0s.04-.05.04-.05c-.2.16-.4.42-.48.66l-.31,1.69h0S.02,23.43.02,23.43c-.08.43.06.87.37,1.18h.01c.31.32.76.46,1.2.37l4.84-.98,2.09-.42c.27-.06.5-.18.68-.37l14.92-14.92c1.16-1.16,1.16-3.05,0-4.21Zm-9.31,2.92l3.18,3.18-8.33,8.33-2.41-.72-.65-2.55L14.82,6.99Zm7.19-.83l-1.89,1.89-3.18-3.18,1.87-1.87,3.2,3.17ZM3.4,21.54l.5-2.8.02-.14.16-.85.05-.05.42,1.65c.07.27.21.5.39.69.17.17.39.3.63.38l1.39.42-1.14.23-2.44.49Z"/></svg>
                                        </figure>
                                    </Link>
                                    

                                    <!-- <Link v-if="wine.wine.user_id !== null" class="button sml" :href="route('wine.edit', wine.wine.id)">Edit</Link>  -->
                                </span> 
                                 
                                
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

<template>
    <Head title="Collection" />
    <main>
        <section>
            <h1 class="coral">Your Wines</h1>
            <div v-if="collection.length !== 0">
                <div class="wine-list">
                    <ul v-for="(wine, i) in collection" :key="i">
                        <WineThumbnail
                            :wine="wine.wine"
                            :quantities="wine.quantities"
                        />
                        <div>
                            <DeleteButton @click="toggleModal(wine.wine.id)" :color="cream" />
                          <Link v-if="wine.user_id !== null" class="button sml" :href="route('wine.edit', wine.wine.id)">Edit</Link>
                        </div>
                      </ul>
                    </div>
            </div>
            <div class="cream" v-else>
                <p>You have no wines yet.</p>
                <Link class="button" :href="route('wine.create')"
                    >Add custom wine</Link
                >
            </div>
        </section>
    </main>
    <ConfirmModal 
            v-show="openDeleteModal" 
            :YesAction="delete" 
            action="delete" 
            actionMessage="Are you sure you want to delete this wine? This action will remove it from your cellars as well. This action cannot be undone." 
        />
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import ConfirmModal from "@/Components/ConfirmModal.vue";
import DeleteButton from "@/Components/ButtonsIcons/DeleteButton.vue";
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
          this.$inertia.delete(route("wine.delete", this.wineId));
          this.openDeleteModal = false
        },
    },
    props: ["collection"],
};
</script>

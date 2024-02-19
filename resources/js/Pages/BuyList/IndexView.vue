<template>
    <Head title="Buy List" />

    <div class="bckgd bckgd-burg">
        
        <main>
            <header>
                <h1 class="index_title">Shopping List</h1>
            </header>

            <div v-if="buylist.length !== 0">
                <ul class="wine-list">
                <WineThumbnail v-for="(wine, i) in buylist" :key="i" :wine="wine">
                    <button class="button sml" @click="deleteOne(wine)">remove wine</button>
                </WineThumbnail>
                </ul>
            </div>

            <div v-else>
                <p class="cream">Your shopping list is empty.</p>
            </div>
        </main>
    </div>
</template>
  
<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';

export default {
  components: {
    WineThumbnail,
    Head,
    Link
  },
  props: ['buylist'],
  methods: {
    deleteOne(wine) {
      Inertia.delete(route('buylist.delete', { wine: wine.id })
      )
    }
  },
  layout: MainLayout
}
</script>
  
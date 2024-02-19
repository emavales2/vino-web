<template>
    <Head title="Buy List" />

    <div class="bckgd bckgd-burg">
        
        <main>
            <header>
                <h1 class="index_title">Shopping List</h1>
            </header>

            <div v-if="buylist.length !== 0">
                <ul class="wine-list">
                <WineThumbnail v-for="(wine, i) in buylist" 
                  :key="i" 
                  :wine="wine"
                  :quantity="wine.quantity"
                >
                <section>
                    <div>
                      <MinusButton 
                        :color="'cream'" 
                        :disabled="wine.qty === 0" 
                        @click="removeOne(wine, wine.qty)"
                      />
                      <PlusButton 
                        :color="'cream'" 
                        @click="addOne(wine)"
                      />
                    </div>
                    <button class="button sml" @click="toggleModal">remove wine</button>
                  </section>
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
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import MainLayout from '@/Layouts/MainLayout.vue';
import WineThumbnail from '@/Components/WineThumbnail.vue';
import PlusButton from '@/Components/ButtonsIcons/PlusButton.vue';
import MinusButton from '@/Components/ButtonsIcons/MinusButton.vue';

export default {
  components: {
    WineThumbnail,
    Head,
    Link,
    MinusButton,
    PlusButton
  },
  layout: MainLayout,
  methods: {
    deleteOne(wine) {
      Inertia.delete(route('buylist.delete', { wine: wine.id }))
    },
    removeOne (wine, quantity) {
      if(quantity > 0)
        Inertia.visit(route('buylist.remove', { : this.cellar, wine: wine }), 
      { preserveScroll: true })
    },
    addOne (wine) {
      Inertia.visit(route('buylist.add', { cellar: this.cellar, wine: wine }),
      { preserveScroll: true })
    },
  },
  props: ['buylist']
}
</script>
  
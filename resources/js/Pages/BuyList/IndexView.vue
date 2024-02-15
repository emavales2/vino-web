<template>
  <div>
    <header class="index_title">
      <h2>Shopping List</h2>
    </header>
    <main>
      <div v-if="buylist.length !== 0">
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in buylist" :key="i" :wine="wine" :deleteAction="deleteOne"/>
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
import WineThumbnail from '@/Components/WineThumbnail.vue';

export default {
  components: {
    WineThumbnail
  },
  props: ['buylist'],
  methods: {
    deleteOne(wine) {
      Inertia.delete(route('buylist.delete', { wine: wine.id })
      //, {
        // onSuccess: () => {
        //   this.$parent.openDialog(
        //     `Wine ${wine.name} has been successfully removed from your shopping list.`
        //   )
        // }
      //}
      )
    }
  },
  layout: MainLayout
}
</script>
  
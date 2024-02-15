<template>
  <div>
    <header class="index_title">
      <h2>Shopping List</h2>
    </header>
    <main>
      <div v-if="buylist.length !== 0">
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in buylist" :key="i" :wine="wine" />
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
  layout: MainLayout
}
</script>
  
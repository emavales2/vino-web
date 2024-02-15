<template>
    <section>
      <h1>Your Wines</h1>
      <div v-if="collection.length !== 0">
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in collection"
            :key="i"
            :wine="wine.wine"
            :quantities="wine.quantities"
          />
        </ul>
      </div>
    </section>
</template>
<script> 
import WineThumbnail from '@/Components/WineThumbnail.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
  name: 'CollectionView',
  components: {
    WineThumbnail
  },
  layout: MainLayout,
  props: ['collection']
}
</script>

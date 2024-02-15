<template>
  <main>
    <section>
      <h1>Your Wines</h1>
      <div v-if="collection.length !== 0">
        <ul class="wine-list">
          <WineThumbnail v-for="(wine, i) in collection"
            :key="i"
            :wine="wine.wine"
          />
        </ul>
      </div>
      <!-- <div v-for="(wine, i) in collection" :key="i">
        <h1>{{ wine.wine.name }}</h1>
        <p>You have {{ wine.totalQty }} of this bottle</p>
        <div v-for="(cellarWine, i) in wine.perCellar">
          <p>{{ cellarWine.qty }} in {{ cellarWine.cellar.name }}</p>
        </div>
        <img :src="wine.wine.photo">
      </div> -->
    </section>
  </main>
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

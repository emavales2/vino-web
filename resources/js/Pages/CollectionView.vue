<template>
  <div v-for="(wine, i) in collection" :key="i">
    <h1>{{ wine.wine.name }}</h1>
    <p>You have {{ wine.totalQty }} of this bottle</p>
    <div v-for="(cellarWine, i) in wine.perCellar">
      <p>{{ cellarWine.qty }} in {{ cellarWine.cellar.name }}</p>
    </div>
    <img :src="wine.wine.photo">
  </div>
</template>
<script> 
export default {
  props: ['collection']
}
</script>

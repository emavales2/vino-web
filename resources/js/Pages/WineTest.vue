<template>
  <div v-for="(wine, i) in wines" :key="i">
    <h1>{{ wine.name }}</h1>
  </div>
</template>
<script>
  export default{
    name:'testWine',
    props: ['wines']
  }
</script>


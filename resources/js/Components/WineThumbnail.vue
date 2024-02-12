<template>
  <article>
    <img :src="wine.wine.photo" :alt="wine.wine.name + ' photo'" width="100px" height="100px">
    <h1>{{ wine.wine.name }}</h1>
    <p>{{ wine.qty }} bottles</p>
  </article>
</template>
<script>
export default {
  name: 'WineThumbnail',
  props: ['wine']
}
</script>
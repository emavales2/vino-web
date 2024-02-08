<template>
    <div v-for="(target, i) in targets" :key="i">
      <h1>{{ target.wine_id }}</h1>
    </div>
  </template>
  <script>
    export default{
      name:'testStore',
      props: ['targets']
    }
  </script>
  
  
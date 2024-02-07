<template>
  <div>
    <h1>results</h1>
    <div v-if="results.length == 0">no results</div>
    <ul v-else>
      <li v-for="(wine, i) in results" 
        :key="i"
      >
        <h1>{{ wine.name }}</h1>
        <p>{{ wine.type }} | {{ wine.country }} | {{ wine.size }}</p>
        <button @click="toggleDialog">Add to cellar</button>
      </li>
    </ul>
    <div v-if="showDialog">
      <h2>pls add some wine</h2>
      <form action="">
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" v-model="quantity">
        <button @click="addToCellar">Add</button>
      </form>
    </div>
  </div>
</template>

<script>
  export default{
    name:'testWine',
    data () {
      return {
        showDialog : false,
        quantity : 0
      }
    },
    methods: {
      toggleDialog () {
        this.showDialog = !this.showDialog
      }
    },
    props: ['results']
  }
</script>
  
  
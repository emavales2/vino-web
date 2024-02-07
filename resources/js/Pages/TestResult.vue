<template>
  <MainLayout>
    <div>
      <h1>results</h1>
      <div v-if="results.length == 0">no results</div>
      <ul v-else>
        <li v-for="(wine, i) in results" 
          :key="i"
        >
          <h1>{{ wine.name }}</h1>
          <p>{{ wine.type }} | {{ wine.country }} | {{ wine.size }}</p>
          <button @click="openDialog(wine.id)">Add to cellar</button>
        </li>
      </ul>
      <Transition name="pop-dialog">
        <div v-if="showDialog" class="bg-stone-400">
          <h2>pls add some wine</h2>
          <form action="">
            <h1>{{ selectedWine.name }}</h1>
            <label for="quantity">Quantity</label>
            <div>
              <input type="number" id="quantity" v-model="quantity">
              <button type="button" @click="quantity ++">+</button>
              <button type="button" @click="quantity --">-</button>
            </div>
            <div>
              <button type="button" @click="addToCellar">Add</button>
              <button type="button" @click="closeDialog">Cancel</button>
            </div>
          </form>
        </div>
      </Transition>
    </div>
  </MainLayout>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue';
  export default{
    name:'testWine',
    components: {
      MainLayout
    },
    data () {
      return {
        showDialog : false,
        quantity : 1,
        selectedWine : ''
      }
    },
    methods: {
      addToCellar() {
        console.log(this.quantity, this.selectedWine.id)
      },
      closeDialog () {
        this.showDialog = false;
        this.quantity = 1;
        this.wineId = 'id';
      },
      openDialog (id) {
        this.showDialog = true;
        this.quantity = 1;
        this.selectedWine = this.results.find(w => w.id === id);
      }
    },
    props: ['results']
  }
</script>
  
  
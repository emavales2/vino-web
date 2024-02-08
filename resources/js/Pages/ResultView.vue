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
          <form @submit.prevent="addToCellar">
            <h1>{{ selectedWine.name }}</h1>
            <label for="quantity">Quantity</label>
            <div>
              <input type="number" id="quantity" v-model="form.quantity">
              <button type="button" @click="form.quantity ++">+</button>
              <button type="button" @click="form.quantity --">-</button>
            </div>
            <div v-for="(cellar, i) in cellars">
              <legend>Select a cellar</legend>
              <label>
                <input type="radio" v-model="form.cellar_id" :value="cellar.id">{{ cellar.name }}
              </label>
            </div>
            <div>
              <button>Add</button>
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
import { useForm } from '@inertiajs/inertia-vue3';
  export default{
    name:'testWine',
    components: {
      MainLayout
    },
    data () {
      return {
        showDialog : false,
        selectedWine : '',
        form : useForm({
          wine_id : '',
          quantity: '1',
          cellar_id: '1',
        })
      }
    },
    methods: {
      addToCellar() {
        console.log(this.form)
        this.form.post(route('wine.store'))
      },
      closeDialog () {
        this.showDialog = false
        this.form.reset()
      },
      openDialog (id) {
        this.form.reset()
        this.showDialog = true
        this.selectedWine = this.results.find(w => w.id === id)
        this.form.wine_id = this.selectedWine.id
      }
    },
    props: ['results', 'cellars']
  }
</script>
  
  
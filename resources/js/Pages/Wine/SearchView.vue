<template>
  <section>
    <h1>There is {{ count }} results for <strong>{{ search }}</strong></h1>
    <div v-if="results.length !== 0">
      <ul class="wine-list">

        <li class="wine-thumbnail"
          v-for="(wine, i) in results"
          :key="i"
        >
          <Link :href="route('wine.show', wine.id)">
            <ColorDrop :class="setColor(wine.type)"/>
            <img :src="wine.photo" loading="lazy" :alt="wine.name">
            <h4>{{ wine.name }}</h4>
          </Link>
        </li>

      </ul>
    </div>
  </section>
  <div v-if="showForm" class="bg-stone-400">
    <div v-if="hasCellar">
      <h2>Add this wine to your cellar</h2>
      <form @submit.prevent="addToCellar">
        <h1>{{ selectedWine.name }}</h1>
        <img :src="selectedWine.photo" :alt="selectedWine.name">
        <label for="quantity">Quantity</label>
        <div>
          <input type="number" id="quantity" v-model="form.quantity">
          <button type="button" @click="form.quantity ++">+</button>
          <button type="button" @click="form.quantity --">-</button>
        </div>
        <div>
          <legend>Select a cellar</legend>
          <label v-for="(cellar, i) in cellars">
            <input type="radio" v-model="form.cellar_id" :value="cellar.id">{{ cellar.name }}
          </label>
        </div>
        <div>
          <button>Add</button>
          <button type="button" @click="closeForm">Cancel</button>
        </div>
      </form>
    </div>
    <div v-else>
      <h1>Oh oh, seems like you have no cellar</h1>
      <Link :href="route('cellar.create')">create a cellar</Link>
      <button type="button" @click="closeForm">Cancel</button>
    </div>
  </div>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import Modal from '@/Components/Modal.vue';
import ColorDrop from '@/Components/ButtonsIcons/ColorDrop.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
export default{
  name:'Wine.SearchView',
  components: {
    Modal,
    Link,
    ColorDrop
  },
  data () {
    return {
      showDialog: false,
      message: '',
      showForm: false,
      selectedWine : '',
      form : useForm({
        wine_id : '',
        quantity: '1',
        cellar_id: ''
      })
    }
  },
  layout: MainLayout,
  methods: {
    addToCellar() {
      this.form.post(route('cellarwine.store'))
      .then(() => {
        const cellarName = this.cellars.find(c => c.id === this.form.cellar_id).name

        this.$parent.openDialog(
          `Yeah! You just added ${this.form.quantity} bottle${this.form.quantity > 1 ? 's' : ''} to ${cellarName}`
          )
        this.closeForm()
      })
    },
    closeForm () {
      this.showForm = false
      this.form.reset()
    },
    openForm (id) {
      this.form.reset()
      if(this.cellars[0]) {
        this.hasCellar = true;
        this.selectedWine = this.results.find(w => w.id === id)
        this.form.cellar_id = this.cellars[0].id
        this.form.wine_id = this.selectedWine.id
      }
      this.showForm = true
    },
    setColor (color) {
      return color.split(' ')[1]
    }
  },
  props: ['results', 'cellars', 'search', 'count']
}
</script>
  
  
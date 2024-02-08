<template>
  <MainLayout>
    <section>
      <h1>There is {{ count }} results for <strong>{{ search }}</strong></h1>
      <div v-if="results.data.length !== 0">
        <ul>
          <li
            v-for="(wine, i) in results.data" 
            :key="i"
          >
            <h1>{{ wine.name }}</h1>
            <p>{{ wine.type }} | {{ wine.country }} | {{ wine.size }}</p>
            <img :src="wine.photo" alt="">
            <button @click="openForm(wine.id)">Add to cellar</button>
          </li>
        </ul>
        <div v-for="(link, i) in results.links">
          <Link :href="link.url">{{ link.label }}</Link>
        </div>
      </div>
    </section>

    <Modal :show="showForm">
      <div class="bg-stone-400">
        <h2>Add this wine to your cellar</h2>
        <form @submit.prevent="addToCellar">
          <h1>{{ selectedWine.name }}</h1>
          <img :src="selectedWine.photo" alt="">
          <label for="quantity">Quantity</label>
          <div>
            <input type="number" id="quantity" v-model="form.quantity">
            <button type="button" @click="form.quantity ++">+</button>
            <button type="button" @click="form.quantity --">-</button>
          </div>
          <legend>Select a cellar</legend>
          <div v-for="(cellar, i) in cellars">
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
    </Modal>
    <DialogWindow v-if="showDialog"
      :message="message"
    />
  </MainLayout>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import Modal from '@/Components/Modal.vue';
import DialogWindow from '@/Components/DialogWindow.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
  export default{
    name:'testWine',
    components: {
      MainLayout,
      Modal,
      DialogWindow,
      Link
    },
    data () {
      return {
        showForm: false,
        showDialog: false,
        message: '',
        selectedWine : '',
        form : useForm({
          wine_id : '',
          quantity: '1',
          cellar_id: this.cellars[0].id,
        })
      }
    },
    methods: {
      addToCellar() {
        this.form.post(route('wine.store'))
        this.message = `You just added ${this.form.quantity} ${this.selectedWine.name} to your ${this.form.cellar_id} cellar`
        this.showDialog = true;
        setTimeout(() => { this.showDialog = false }, 2000)
        this.closeFrom();
      },
      closeFrom () {
        this.showForm = false
        this.form.reset()
      },
      openForm (id) {
        this.form.reset()
        this.showForm = true
        this.selectedWine = this.results.data.find(w => w.id === id)
        this.form.wine_id = this.selectedWine.id
      }
    },
    props: ['results', 'cellars', 'search', 'count']
  }
</script>
  
  
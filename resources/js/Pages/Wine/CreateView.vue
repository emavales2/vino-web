<template>
  <Head title="Create Wine" />
  <GoBackButton/>
  <header>
    <h1>Add your custom wine</h1>
    <p>complete this Form</p>
  </header>
  <form @submit.prevent="submit">
    <section>
      <legend>Tell us about your wine</legend>
      <label>name
        <input type="text" v-model="wineForm.name">
        <p v-if="wineForm.errors.name">{{ wineForm.errors.name }}</p>
      </label>
      <label>type
        <input type="text" v-model="wineForm.type">
        <p v-if="wineForm.errors.type">{{ wineForm.errors.type }}</p>
      </label>
      <label>country
        <input type="text" v-model="wineForm.country">
        <p v-if="wineForm.errors.country">{{ wineForm.errors.country }}</p>
      </label>
      <label>size
        <input type="text" v-model="wineForm.size">
        <p v-if="wineForm.errors.size">{{ wineForm.errors.size }}</p>
      </label>
      <label>price
        <input type="number" min="0" step="0.01" v-model="wineForm.price">
        <p v-if="wineForm.errors.price">{{ wineForm.errors.price }}</p>
      </label>
    </section>
    <section>
      <legend>What do you want to do with this wine?</legend>
      <div>
        <legend>Store in a cellar</legend>
        <label v-for="(cellar, i) in cellars">
          <input type="radio" v-model="wineForm.cellar_id" :value="cellar.id">{{ cellar.name }}
        </label>
        <p v-if="wineForm.errors.cellar_id">{{ wineForm.errors.cellar_id }}</p>

        <label>How many bottles do you want to store?
          <input type="number" v-model="wineForm.cellar_qty">
          <p v-if="wineForm.errors.cellar_qty">{{ wineForm.errors.cellar_qty }}</p>
        </label>

      </div>
      <div>
        <legend>Add to your buy list</legend>
        <label>How many bottles do you want to buy?
          <input type="number" v-model="wineForm.buyList_qty">
          <p v-if="wineForm.errors.buyList_qty">{{ wineForm.errors.buyList_qty }}</p>
        </label>
      </div>
    </section>
    <button>save</button>
  </form>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';
import GoBackButton from '@/Components/GoBackButton.vue';

export default {
  name: 'Wine.CreateView',
  components: {
      Head,
      Link,
      GoBackButton
  },
  data () {
    return {
      wineForm : useForm({
        name : '',
        type : '',
        country: '',
        price: '',
        size: '',
        cellar_id: this.cellars[0].id,
        cellar_qty: '',
        buyList_qty: '',
      }),
    }
  },
  methods: {
    submit () {
      this.wineForm.post(route('wine.store'));
    }
  },
  props: ['cellars']
}
</script>
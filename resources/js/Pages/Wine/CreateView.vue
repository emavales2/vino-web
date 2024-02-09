<template>
  <Head title="Create Wine" />
  <GoBackButton/>
  <header>
    <h1>Add your custom wine</h1>
    <p>complete this form</p>
  </header>
  <form @submit.prevent="submit">
    <section>
      <legend>Tell us about your wine</legend>
      <label>name
        <input type="text" v-model="form.name">
        <p v-if="form.errors.name">{{ form.errors.name }}</p>
      </label>
      <label>type
        <input type="text" v-model="form.type">
        <p v-if="form.errors.type">{{ form.errors.type }}</p>
      </label>
      <label>country
        <input type="text" v-model="form.country">
        <p v-if="form.errors.country">{{ form.errors.country }}</p>
      </label>
      <label>size
        <input type="text" v-model="form.size">
        <p v-if="form.errors.size">{{ form.errors.size }}</p>
      </label>
      <label>price
        <input type="number" min="0" step="0.01" v-model="form.price">
        <p v-if="form.errors.price">{{ form.errors.price }}</p>
      </label>
    </section>
    <section>
      <legend>What do you want to do with this wine?</legend>
      <div>
        <legend>Store in a cellar</legend>
        <label v-for="(cellar, i) in cellars">
          <input type="radio" v-model="form.cellar_id" :value="cellar.id">{{ cellar.name }}
        </label>
        <label>How many bottles do you want to store?
          <input type="number" v-model="form.cellar_quantity">
        </label>
      </div>
      <div>
        <legend>Add to your buy list</legend>
        <label>How many bottles do you want to buy?
          <input type="number" v-model="form.buy_quantity">
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
      }),
      cellarWineForm : useForm({
        
      })
    }
  },
  methods: {
    submit () {
      this.form.post(route('wine.store'));
    }
  },
  props: ['cellars']
}
</script>
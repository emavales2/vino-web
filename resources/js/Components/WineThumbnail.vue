<template>
  <article>
    <img :src="wine.wine.photo" :alt="wine.wine.name + ' photo'" width="100px" height="100px">
    <h1>{{ wine.wine.name }}</h1>
    <label>
      <input type="number" v-model="form.quantity">
    </label>
    <p>{{ wine.qty }} bottles</p>
    <div>
      <button @click="addBottle">+</button>
      <button @click="removeBottle">-</button>
    </div>
  </article>
</template>
<script>
import { Inertia } from '@inertiajs/inertia'
import { useForm } from '@inertiajs/inertia-vue3'
export default {
  name: 'WineThumbnail',
  data () {
    return{
      form: useForm({
        quantity: this.wine.qty
    })
    }
  },
  methods: {
    addBottle () {
      Inertia.get(route('cellarwine.add', {cellar: this.cellar.id, wine: this.wine.wine.id} ))
      .then(this.wine.qty ++)
    },
    removeBottle () {
      Inertia.get(route('cellarwine.remove', {cellar: this.cellar.id, wine: this.wine.wine.id} ))
      .then(this.wine.qty --)
    }
  },
  props: ['wine', 'cellar']
}
</script>
//keep 
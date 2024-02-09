<template>
  <form @submit.prevent="submit">
    <label>
      <input type="text" v-model="form.search">
    </label>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
export default{
  name:'search-bar',
  data () {
    return {
      form : useForm({
        search : ''
      })
    }
  },
  methods: {
    submit () {
      this.form.get(route('search', this.form.search))
    }
  }
}
</script>
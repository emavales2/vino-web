<template>
  <div class="search-bar">
    <legend>find a wine</legend>
    <form @submit.prevent="submit">
      <label>
        <input 
          type="text" 
          placeholder="chardonnay"
          v-model="form.search"
        >
      </label>
      <button>search</button>
      <button type="button" @click="toggleSearch">Cancel</button>
    </form>
  </div>
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
      this.form.get(route('wine.search'))
      this.toggleSearch();
    }
  },
  props: ['toggleSearch']
}
</script>
// keep
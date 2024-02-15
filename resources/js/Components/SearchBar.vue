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
      <SearchIcon :color="'burgundy'" :searchAction="submit"/>
      <DeleteButton :deleteAction="searchAction"/>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import SearchIcon from './ButtonsIcons/SearchIcon.vue';
import DeleteButton from './ButtonsIcons/DeleteButton.vue';
export default{
  name:'search-bar',
  components:{
    SearchIcon,
    DeleteButton
  },
  data () {
    return {
      form : useForm({
        search : ''
      })
    }
  },
  methods: {
    submit () {
      this.form.get(route('wine.search'), {
        onSuccess: () => this.searchAction()
      })
      
    }
  },
  props: ['searchAction']
}
</script>

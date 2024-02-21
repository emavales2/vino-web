<template>
  <div class="search-bar">
    <!-- <legend class="block-font">find a wine</legend> -->
    <form @submit.prevent="submit">
        <fieldset class="fieldset_1 fs_burg row_els_apart">
            <legend aria-labelledby="search">find a wine!</legend>
            <label>
                <input 
                type="text" 
                id="search"
                placeholder="chardonnay"
                v-model="form.search"
                >
            </label>
            <SearchIcon :color="'burgundy'" :searchAction="submit"/>
        </fieldset>    

      <!-- <label>
        <input 
          type="text" 
          placeholder="chardonnay"
          v-model="form.search"
        >
      </label> -->

      <!-- <SearchIcon :color="'burgundy'" :searchAction="submit"/> -->
      <DeleteButton :deleteAction="searchAction"/>
    </form>
    <InputError class="input_err" :message="form.errors.search"/>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import SearchIcon from './ButtonsIcons/SearchIcon.vue';
import DeleteButton from './ButtonsIcons/DeleteButton.vue';
import InputError from './InputError.vue';
export default{
  name:'search-bar',
  components:{
    SearchIcon,
    DeleteButton,
    InputError
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
        onSuccess: () => {
          this.searchAction()
          this.form.reset()
        }
      })
      
    }
  },
  props: ['searchAction']
}
</script>

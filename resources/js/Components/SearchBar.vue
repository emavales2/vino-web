<template>
  <div class="search-bar">
    <form @submit.prevent="submit">
            <label for="search" :aria-label="__('dialogue.find_wine')">{{ __('dialogue.find_wine') }}</label>
            <div>
              <input 
                  type="text" 
                  id="search"
                  class="mt-1 block w-full"
                  placeholder="chardonnay"
                  v-model="form.search"
                  >
                  <SearchIcon :color="'burgundy'" :searchAction="submit"/>
                  <DeleteButton :deleteAction="searchAction"/>
              </div>
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

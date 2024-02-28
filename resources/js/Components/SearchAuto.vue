<template>
  <div>
    <form class="search-auto">
      <fieldset class="fieldset_1 row_els_apart">
        <legend aria-labelledby="search">{{ __('cellar.search_in_cellar') }}</legend>
        <label for="search">
          <input 
            type="text" 
            id="search"
            class="mt-1 block w-full"
            placeholder="chardonnay"
            v-model="term"
          />
        </label>
        <SearchIcon :color="'cream'" :searchAction="handleInput"/>
      </fieldset>  
    </form>  
  </div>
</template>

<script>
import SearchIcon from './ButtonsIcons/SearchIcon.vue';
export default {
  name: 'SearchAuto',
  components: {
    SearchIcon
  },
  props: ['cellars'],
  data() {
    return {
      collection: this.cellars,
      term: ''
    };
  },
  methods: {
    handleInput() {
      const data = {
        myCollection: this.collection,
        term: this.term || ''
      }
      const lowerCaseTerm = this.term.toLowerCase();
      
      if (this.term.length >= 3) {
        data.myCollection = this.collection.filter(objeto => {
        if (objeto.wine && objeto.wine.name) {
          const wineName = objeto.wine.name.toLowerCase();
          return wineName.includes(lowerCaseTerm);
        }
      });
        this.$emit('collection-event', data);
      } else if (this.term.length === 0) {
        this.$emit('collection-event', data);
      }
      
    }
  },
};
</script>

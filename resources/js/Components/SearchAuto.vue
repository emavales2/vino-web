<template>
  <div class="search-dashboard search-bar">
    <form>
        <label for="search" aria-label="search">{{ __('cellar.search_in_cellar') }}</label>
        <div>
          <input 
            type="text" 
            id="search"
            placeholder="chardonnay"
            v-model="term"
          />
        <SearchIcon :color="'cream'" :searchAction="handleInput"/>
        </div>
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

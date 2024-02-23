<template>
  <div>
    <fieldset class="fieldset_1">
      <legend aria-labelledby="search">{{ __('dialogue.find_wine') }}</legend>
      <label>
        <input 
          type="text" 
          id="search"
          class="mt-1 block w-full"
          placeholder="chardonnay"
          v-model="term"
          @input="handleInput"
        />
      </label>
    </fieldset>    
  </div>
</template>

<script>

export default {
  name: 'SearchAuto',
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
        myCollection: [],
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

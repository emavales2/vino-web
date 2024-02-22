<template>
  <div>
    <fieldset class="fieldset_1">
      <legend aria-labelledby="search">Find a wine!</legend>
      <label>
        <input 
          type="text" 
          id="search"
          class="mt-1 block w-full"
          placeholder="chardonnay"
          v-focus
          v-model="term"
          @input="handleInput"
        />
      </label>
    </fieldset>    
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  name: 'SearchAuto',
  props: ['cellar','termReturn'],
  data() {
    return {
      term: this.termReturn || '',
    };
  },
  methods: {
    handleInput() {
      if (this.term.length >= 3) {
        this.searchAuto();
      } else if (this.term.length === 0) {
        this.index();
      }
    },
    searchAuto() {
      Inertia.get(route('cellar.searchauto', { cellarId: this.cellar.id, term: this.term }));
    },
    index() {
      Inertia.visit(route('cellar.show', {cellar: this.cellar }));
    },
  },
};
</script>

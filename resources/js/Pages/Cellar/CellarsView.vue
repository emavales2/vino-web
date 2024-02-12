<template>
  <Head title="Cellars" />
  <div>
    <h1>List of Cellars</h1>
    <div>
      <button type="button" @click="redirectToAdd()">Add</button>
    </div>
    <ul v-if="cellars.length > 0">
      <li v-for="cellar in cellars" :key="cellar.id">
        <button type="button" @click="redirectToShow(cellar.id)">{{ cellar.name }}</button>
      </li>
    </ul>
    <p v-else>There is no information available.</p>
  </div>
</template>
  
<script>
  import { Head } from '@inertiajs/inertia-vue3';
  
  export default {
    name: 'CellarsView',
    props: {
      cellars: Array,
    },
    components: {
      Head
    },
    methods: {
      redirectToShow(cellarId) {
        this.$inertia.visit(route('cellar.show', { id: cellarId }));
      },
      redirectToAdd() {
        this.$inertia.visit(route('cellar.create'));
      }      
    }
  }
</script>
  
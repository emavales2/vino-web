<template>
  <Head title="Cellars" />
  <div>
    <h1>List of Cellars</h1>
    <div>
      <Link :href="route('cellar.create')">Add</Link>
    </div>
    <ul v-if="cellars.length > 0">
      <li v-for="cellar in cellars" :key="cellar.id">
        <Link :href="route('cellar.show', cellar.id)">{{ cellar.name }}</Link>
      </li>
    </ul>
    <p v-else>There is no information available.</p>
  </div>
</template>
  
<script>
  import { Head } from '@inertiajs/inertia-vue3';
  import { Link } from '@inertiajs/inertia-vue3';
  export default {
    name: 'CellarsView',
    props: {
      cellars: Array,
    },
    components: {
      Head,
      Link
    }    
  }
</script>
  
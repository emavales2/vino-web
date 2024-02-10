<template>
  <Head title="Cellar" />
  <div>
    <h1>Cellar Detail</h1>
    <p>Name: {{ cellar.name }}</p>
    <div>
      <button type="button" @click="redirectToEdit(cellar.id)">Edit</button>
      <button type="button" @click="redirectToDelete(cellar.id)">Delete</button>
    </div>
  </div>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
  name: 'ShowView',
  components: {
    Head
  },
  props: {
    cellar: {
      type: Object,
    }
  },
    methods: {
      redirectToEdit(cellarId) {
        this.$inertia.visit(route('cellar.edit', { id: cellarId }));
      },
      redirectToDelete() {
        if (confirm('Are you sure you want to delete this cellar?')) {
          this.$inertia.delete(route('cellar.delete', { cellar: this.cellar }));
        }
      }      
    }
}
</script>

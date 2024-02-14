<template>
  <Head title="Cellar" />
  <div>
    <h1>New Cellar</h1>
    <form @submit.prevent="submitForm" :action="createRoute">
      <label for="name">Name:</label>
      <input v-model="form.name" type="text" id="name" required>

      <button type="submit">Save</button>
    </form>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
  name: 'CreateView',
  components: {
    Head
  },
  data() {
    return {
      form: {
        name: '',
      },
    };
  },
  computed: {
    createRoute() {
      return route('cellar.store');
    },
  },
  methods: {
    submitForm() {
      this.$inertia.post(this.createRoute, this.form)
        .then(response => {
          if (response.headers.location) {
            this.$inertia.visit(response.headers.location);
          } else {
            console.error("The 'location' header is not defined in the response.");
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
        });
    },
  },
};
</script>
// keep
<template>
  <Head title="Cellar" />
  <header class="index_title">
    <h2>New Cellar</h2>
  </header>
  <main class="main-default">
    <form @submit.prevent="submitForm" :action="createRoute">
      <label for="name" class="cream">Name:</label>
      <input v-model="form.name" type="text" id="name" required>

      <button class="button" type="submit">Save</button>
    </form>
  </main>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

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
  layout: MainLayout,
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
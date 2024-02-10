<template>
  <Head title="Cellar" />
  <div>
    <h1>Edit Cellar</h1>
    <form @submit.prevent="submitForm" :action="updateRoute">
      <label for="name">Name:</label>
      <input v-model="form.name" type="text" id="name" required>

      <button type="submit">Save</button>
    </form>
  </div>
</template>
  
<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
  name: 'EditView',
  components: {
    Head
  },
  props: {
    cellar: {
      type: Object,
    }
  },
  data() {
    return {
      form: {
        id: this.cellar.id,
        name: this.cellar.name,
      },
    };
  },
  computed: {
    updateRoute() {
      return route('cellar.update', { cellar: this.form.id });
    },
  },
  methods: {
    submitForm() {
      this.$inertia.put(this.updateRoute, this.form)
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
  
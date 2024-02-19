<template>
    <Head title="Edit Cellar" />

    <main>
        <GoBackButton :color="'cream'" class="button_back"/>
    
    <header>
        <h1 class="index_title">Edit Cellar</h1>
    </header>

        <form @submit.prevent="submitForm" :action="updateRoute">
        <label for="name" class="legend cream">Modify your cellar !</label>
        <input v-model="form.name" type="text" id="name" required>

        <button class="button" type="submit">Save</button>
        </form>
    </main>
</template>
  
<script>
import { Head } from '@inertiajs/inertia-vue3';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
  name: 'EditView',
  components: {
    Head,
    GoBackButton,
  },
  props: {
    cellar: {
      type: Object,
    }
  },
  layout: MainLayout,
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

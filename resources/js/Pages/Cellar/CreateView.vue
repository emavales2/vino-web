<template>
  <Head title="Cellar" />
  <main>
    <GoBackButton :color="'cream'" class="button_back"/>

    <header class="index_title">
      <h1 class="index_title">{{ __('cellar.new') }}</h1>
    </header>
    
      <form @submit.prevent="submitForm" :action="createRoute">
        <label for="name">
            <h2 class="disp_subtitle">{{ __('cellar.give_name') }}</h2>
        </label>
        
        <fieldset class="fieldset_1">
            <legend aria-labelledby="name">{{ __('cellar.name') }}</legend>            
            <input v-model="form.name" type="text" id="name" placeholder="Cellar Name">
        </fieldset>

        <button class="button" type="submit">{{ __('buttons.save') }}</button>
      </form>
  </main>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';

export default {
  name: 'CreateView',
  components: {
    Head,
    GoBackButton,
    MainLayout,
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
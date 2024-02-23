<template>
  <Head title="Cellar" />
  <main>
    <GoBackButton :color="'cream'"/>

    <header class="index_title">
      <h1 class="index_title">{{ __('cellar.new') }}</h1>
    </header>
    
      <form @submit.prevent="submitForm">
        <label for="name">
            <h2 class="disp_subtitle">{{ __('cellar.give_name') }}</h2>
        </label>
        
        <fieldset class="fieldset_1">
            <legend aria-labelledby="name">{{ __('cellar.name') }}</legend>            
            <input v-model="form.name" type="text" id="name" placeholder="Cellar Name">
            <InputError class="msg input_err" :message="form.errors.name" />
        </fieldset>

        <button class="button" type="submit">{{ __('buttons.save') }}</button>
      </form>
  </main>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
import InputError from '@/Components/InputError.vue';

export default {
  name: 'CreateView',
  components: {
    Head,
    GoBackButton,
    MainLayout,
    InputError
  },
  data() {
    return {
      form: useForm({
        name: '',
      }),
    };
  },
  layout: MainLayout,
  methods: {
    submitForm() {
      this.form.post(route('cellar.store'), {
          onSuccess: () => {
            this.$parent.openDialog(`Great ! Your cellar has been added`);
          }
      });
    },
  },
};
</script>

<template>
  <Head title="Edit Cellar" />

  <main>
    <GoBackButton :color="'cream'" />

    <header>
      <h1 class="title_index">{{ __('cellar.edit') }}</h1>
    </header>

    <form @submit.prevent="submitForm">
      <label for="name">
        <h2 class="title_disp_subt">{{ __('cellar.modify_text') }}</h2>
      </label>

      <fieldset class="fieldset_1">
        <legend aria-labelledby="name">{{ __('cellar.name') }}</legend>
        <input v-model="form.name" type="text" id="name" required>
        <InputError class="auto_msg auto_msg_input_err" :message="form.errors.name" />
      </fieldset>

      <button class="button" type="submit">{{ __('buttons.save') }}</button>
    </form>
  </main>
</template>
  
<script>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from '@/Components/InputError.vue';

export default {
  name: 'EditView',
  components: {
    Head,
    GoBackButton,
    InputError
  },
  props: {
    cellar: {
      type: Object,
    }
  },
  layout: MainLayout,
  data() {
    return {
      form: useForm({
        id: this.cellar.id,
        name: this.cellar.name,
      }),
    };
  },
  methods: {
    submitForm() {
      this.form.put(route('cellar.update', { cellar: this.form.id }), {
        onSuccess: () => {
          this.$parent.openDialog(`Cellar updated successfully!`);
        },
      });
    },
  },
};
</script>

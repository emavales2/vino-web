<template>
  <Head title="Cellar" />
  <main>
    <GoBackButton :color="'cream'"/>
    <header class="index_title">
      <h1 class="index_title">{{ __('note.create_new') }}</h1>
      <p>{{ wine.name }}</p>
      <figure>
        <img
         :src="wine.photo" 
         :alt="wine.name"
        >
      </figure>
    </header>
      <form @submit.prevent="submitForm">
        <h2 class="disp_subtitle">{{ __('note.write_note') }}</h2>

        <fieldset class="fieldset_1">
            <legend aria-labelledby="note">note</legend>          
            <textarea v-model="form.note" id="note" :placeholder="__('note.note_placeholder')"></textarea>
            <!-- <InputError class="msg input_err" :message="form.errors.note" /> -->
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
import { Inertia } from '@inertiajs/inertia';

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
        note: '',
        wine_id: this.wine.id
      }),
    };
  },
  layout: MainLayout,
  methods: {
    submitForm() {
      this.form.post(route('note.store'), {
          onSuccess: () => {
            this.$parent.openDialog(`Great ! Your note has been created`);
            Inertia.visit(route('wine.show', this.wine.id))
          }
      });
    },
  },
  props: ['wine']
};
</script>

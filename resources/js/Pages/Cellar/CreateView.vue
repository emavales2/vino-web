<template>
  <Head title="Cellar" />
  <main>
    <GoBackButton :color="'cream'"/>

    <header>
      <h1 class="title_index">{{ __('cellar.new') }}</h1>
    </header>
    
      <form @submit.prevent="submitForm">
            <h2 class="title_disp_subt">{{ __('cellar.give_name') }}</h2>
        
        <div class="form_wrapper_2">
            <label for="name">{{ __('cellar.name') }}</label>            
            <input v-model="form.name" type="text" id="name" placeholder="Cellar Name">
            <InputError class="auto_msg auto_msg_input_err" :message="form.errors.name" />
        </div>

        <button class="button btn-cream" type="submit">{{ __('buttons.save') }}</button>
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
      })
    };
  },
  layout: MainLayout,
  methods: {
    submitForm() {
      this.form.post(route('cellar.store'), {
          onSuccess: () => {
            this.$parent.openDialog(this.__('dialogue.cellar_create'));
          }
      });
    },
  },
};
</script>

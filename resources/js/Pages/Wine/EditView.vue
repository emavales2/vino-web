<template>
<Head title="Edit Wine" />

<div class="bckgd">
  <main>
    <GoBackButton :color="'cream'"/>
    <header>
      <h1 class="title_index">{{ __('cellar.edit_title') }}</h1>
    </header>
  
      <form @submit.prevent="submit" class="form-create-wine">
        <div class="form_wrapper_2">
          <label aria-labelledby="name" for="name">{{ __('cellar.wine_name') }}</label>
          <input
              id="name"
              type="text"
              v-model="form.name"
              autofocus
              autocomplete="name"
              :placeholder="__('cellar.wine_name')"
          />
          <InputError class="auto_msg auto_msg_input_err" :message="form.errors.name" />
        </div>
      
        <fieldset class="fieldset_3">
          <legend>{{ __('cellar.wine_type') }}</legend>
          <div>
              <span class="radio-round radio-red">
                  <input
                      id="type-red"
                      type="radio"
                      v-model="form.type"
                      value='{"fr":"Vin rouge ","en":"Red wine "}'
                      checked
                  >
                  <label for="type-red">{{ __('words.red') }}</label>
              </span>
              <span class="radio-round radio.white">
                  <input
                      id="type-white"
                      type="radio"
                      v-model="form.type"
                      value='{"fr":"Vin blanc ","en":"White wine "}'
                  >
                  <label for="type-white">{{ __('words.white') }}</label>
              </span>
              <span class="radio-round radio-rose">
                  <input
                      id="type-rose"
                      type="radio"
                      v-model="form.type"
                      value='{"fr":"Vin ros\u00e9 ","en":"Ros\u00e9 "}'
                  >
                  <label for="type-rose">{{ __('words.rose') }}</label>
              </span>
          </div>
          <InputError class="auto_msg auto_msg_input_err" :message="form.errors.type" />
        </fieldset>
        <div class="form_wrapper_2">
          <label aria-labelledby="country" for="country">{{__('cellar.wine_country')}}</label>
          <input
              id="country"
              type="text"
              v-model="form.country"
              autofocus
              autocomplete="country"
              :placeholder="__('cellar.wine_country')"
              />
          <InputError class="auto_msg auto_msg_input_err" :message="form.errors.country" />
        </div>
        <div class="form_wrapper_2">
          <label  aria-labelledby="size" for="size">{{ __('cellar.wine_size') }}</label>
          <input
              id="size"
              type="text"
              v-model="form.size"
              autofocus
              autocomplete="size"
              :placeholder=" __('cellar.wine_size')"
              />
          <InputError class="auto_msg auto_msg_input_err" :message="form.errors.size" />
        </div>
        <div class="form_wrapper_2">
          <label aria-labelledby="price" for="price">{{ __('cellar.wine_price') }}</label>
          <input
              id="price"
              type="number"
              min="0"
              step="0.01"
              v-model="form.price"
              autofocus
              autocomplete="price"
              :placeholder="__('cellar.wine_price')"
              />
          <InputError class="auto_msg auto_msg_input_err" :message="form.errors.price" />
        </div>
        <button class="button">{{ __('buttons.update') }}</button>
      </form>
    </main>
  </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import GoBackButton from "@/Components/ButtonsIcons/GoBackButton.vue";
import InputError from "@/Components/InputError.vue";

export default {
  name: "Update Wine",
  components: {
    Head,
    GoBackButton,
    MainLayout,
    InputError
  },
  data() {
    return {
        form: useForm({
            id: this.wine.id,
            name: this.wine.name,
            type: '{"fr":"Vin rouge ","en":"Red wine "}',
            country: this.wine.country,
            size: this.wine.size,
            price: this.wine.price,
        }),
        updateDialogue: this.trans.dialogue.wine_update
    };
  },
  layout: MainLayout,
  methods: {
    submit() {
      this.form.put(route("wine.update", {wine: this.wine.id}), {
        onSuccess: () => {
          this.$parent.openDialog(this.updateDialogue);
        }
      });
    },
  },
    props: ["wine", "trans"]
};
</script>
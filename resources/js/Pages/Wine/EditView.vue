<template>
<Head title="Edit Wine" />

<div class="bckgd">
  <main>
    <GoBackButton :color="'cream'"/>
    <header>
      <h1 class="index_title">{{ __('cellar.edit_title') }}</h1>
    </header>
  
      <form @submit.prevent="submit" class="form-create-wine">
        <fieldset class="fieldset_1">
            <legend>{{ __('cellar.wine_name') }}</legend>
            <label for="name" hidden></label>
            <input
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                autofocus
                autocomplete="name"
                placeholder="name"
              />
            <InputError class="msg input_err" :message="form.errors.name" />
        </fieldset>

        <fieldset class="fieldset_1">
            <legend>{{ __('cellar.wine_type') }}</legend>
            <label for="type" hidden></label>
            <input
                id="type"
                type="text"
                class="mt-1 block w-full"
                v-model="form.type"
                autofocus
                autocomplete="type"
                placeholder="type"
              />
            <InputError class="msg input_err" :message="form.errors.type" />
        </fieldset>

        <fieldset class="fieldset_1">
            <legend>{{ __('cellar.wine_country') }}</legend>
            <label for="country" hidden></label>
            <input
                id="country"
                type="text"
                class="mt-1 block w-full"
                v-model="form.country"
                autofocus
                autocomplete="country"
                placeholder="country"
              />
            <InputError class="msg input_err" :message="form.errors.country" />
        </fieldset>

        <fieldset class="fieldset_1">
            <legend>{{ __('cellar.wine_size') }}</legend>
            <label for="size" hidden></label>
            <input
                id="size"
                type="text"
                class="mt-1 block w-full"
                v-model="form.size"
                autofocus
                autocomplete="size"
                placeholder="size"
              />
            <InputError class="msg input_err" :message="form.errors.size" />
        </fieldset>

        <fieldset class="fieldset_1">
            <legend>{{ __('cellar.wine_price') }}</legend>
            <label for="price" hidden></label>
            <input
                id="price"
                type="number"
                min="0"
                step="0.01"
                class="mt-1 block w-full"
                v-model="form.price"
                autofocus
                autocomplete="price"
                placeholder="price"
              />
            <InputError class="msg input_err" :message="form.errors.price" />
        </fieldset>
        
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
            type: this.wine.type,
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
      console.log(this.form.id);
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
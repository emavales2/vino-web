<template>
<Head title="Edit Wine" />
<div>
  <main>
    <header>
      <h2 class="block-font txt-center coral">Edit your custom wine</h2>
    </header>
    <GoBackButton :color="'cream'"/>
      <form @submit.prevent="submit" class="form-create-wine">
          <fieldset>
            <label for="name" hidden></label>
            <input
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
                placeholder="name"
              />
            <InputError class="msg input_err" :message="form.errors.name" />
          </fieldset>
          <fieldset>
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
          <fieldset>
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
          <fieldset>
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
          <fieldset>
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
        <button class="button">Update</button>
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
    };
  },
  layout: MainLayout,
  methods: {
    submit() {
      this.form.put(route("wine.update", {wine: this.wine.id}), {
        onSuccess: () => {
          this.$parent.openDialog('Wine updated successfully!');
        }
      });
    },
  },
    props: ["wine"]
};
</script>
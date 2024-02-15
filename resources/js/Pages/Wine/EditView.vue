<template>
<Head title="Create Wine" />
<div>
  <main>
    <header>
      <h1>Edit your custom wine</h1>
    </header>
    <GoBackButton :color="'cream'"/>
      <form @submit.prevent="submit" class="form-create-wine">
          <legend>Tell us about your wine</legend>
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


          <!-- <h4>What do you want to do with this wine?</h4>
          <div>
            <h5>Store in a cellar</h5>
            <div>
              <div v-for="(cellar, i) in cellars">
                <input
                  :key="i"
                  :id=cellar.id
                  type="radio"
                  class="radio"
                  v-model="form.cellar_id"
                  :value="cellar.id"
                >
                <label :for=cellar.id>{{ cellar.name }}</label>
              </div>
            </div>
            <p v-if="form.errors.cellar_id">{{ form.errors.cellar_id }}</p>
          </div>
          <div>
            <label for="cellar_qty">How many bottles do you want to store</label>
            <input
                id="cellar_qty"
                type="number"
                min="0"
                class="mt-1 block w-full"
                v-model="form.cellar_qty"
                autofocus
              />
            <InputError class="msg input_err" :message="form.errors.price" />

            <h5>Add to your buy list</h5>
            <label>How many bottles do you want to buy?
              <input type="number" v-model="form.buyList_qty">
              <p v-if="form.errors.buyList_qty">{{ form.errors.buyList_qty }}</p>
            </label>
          </div> -->
        <button>save wine</button>
      </form>
    </main>
  </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

export default {
  name: "Update Wine",
  components: {
    Head,
    MainLayout,
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
            cellar_id: this.wine.cellar_id,
            cellar_qty: this.wine.cellar_qty,
            buyList_qty: this.wine.buyList_qty,
        }),
    };
  },
  layout: MainLayout,
  methods: {
    submit() {
      this.form.put(route("wine.edit"), {wine: this.wine.id});
    },
  },
    props: ["wine", "cellars"]
};
</script>
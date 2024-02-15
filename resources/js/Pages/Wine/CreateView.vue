<template>
  <Head title="Create Wine" />
    <GoBackButton/>
    <div class="burg_bg">
    <main>
    <header class="block-font txt-center coral">
      <h1>Add your custom wine</h1>
      <p>complete this Form</p>
    </header>
    <form @submit.prevent="submit">
      <fieldset>
        <legend class="cream">Tell us about your wine</legend>
        <label for="wine_name" hidden>Name</label>
        <input id="wine_name" placeholder="Name" type="text" v-model="wineForm.name">
        <InputError v-if="wineForm.errors.name" class="msg input_err" :message="wineForm.errors.name"/>

        <label for="wine_type" hidden>Type</label>
        <input id="wine_type" placeholder="Type of wine" type="text" v-model="wineForm.type">
        <InputError v-if="wineForm.errors.type" class="msg input_err" :message="wineForm.errors.type"/>
        
        <label for="wine_country" hidden>Country</label>
        <input id="wine_country" placeholder="Country of origin" type="text" v-model="wineForm.country">
        <InputError v-if="wineForm.errors.country" class="msg input_err" :message="wineForm.errors.country"/>
        
        <label for="wine_size" hidden>Size</label>
        <input id="wine_size" placeholder="Size" type="text" v-model="wineForm.size">
        <InputError v-if="wineForm.errors.size" class="msg input_err" :message="wineForm.errors.size"/>
        
        <label for="wine_price" hidden>Price</label>
        <input id="wine_price" placeholder="Price" type="number" min="0" step="0.01" v-model="wineForm.price">
        <InputError v-if="wineForm.errors.price" class="msg input_err" :message="wineForm.errors.price"/>
    </fieldset>
    <fieldset class="cream">
        <legend>What do you want to do with this wine?</legend>
        <div>
            <legend>Store in a cellar</legend>
            <label v-for="(cellar, i) in cellars" :key="cellar.id">
                <input type="radio" v-model="wineForm.cellar_id" :value="cellar.id">{{ cellar.name }}
            </label>
            <InputError v-if="wineForm.errors.cellar_id" class="msg input_err" :message="wineForm.errors.cellar_id"/>
            
            <label for="cellar_qty">How many bottles do you want to store?</label>
            <input id="cellar_qty" type="number" v-model="wineForm.cellar_qty">
            <InputError v-if="wineForm.errors.cellar_qty" class="msg input_err" :message="wineForm.errors.cellar_qty"/>
        </div>

        <div>
            <legend>Add to your buy list</legend>
            <label for="buyList_qty">How many bottles do you want to buy?</label>
            <input id="buyList_qty" type="number" v-model="wineForm.buyList_qty">
            <InputError v-if="wineForm.errors.buyList_qty" class="msg input_err" :message="wineForm.errors.buyList_qty"/>
        </div>
    </fieldset>
      <button class="button">save wine</button>
    </form>
  </main>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
import InputError from '@/Components/InputError.vue';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
  name: 'Wine.CreateView',
  components: {
      Head,
      Link,
      InputError,
      GoBackButton
  },
  data () {
    return {
      wineForm : useForm({
        name : '',
        type : '',
        country: '',
        price: '',
        size: '',
        cellar_id: this.cellars[0].id,
        cellar_qty: '',
        buyList_qty: '',
      }),
    }
  },
  layout: MainLayout,
  methods: {
    submit () {
      this.wineForm.post(route('wine.store'), {
        onSuccess: () => {
          this.$parent.openDialog(`Great ! Your wine has been added`);
        }
    });
    }
  },
  props: ['cellars']
}
</script>
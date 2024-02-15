<template>
  <Head title="Create Wine" />
  <div>
    <main>
      <header>
        <h1>Add your custom wine</h1>
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


            <h4>What do you want to do with this wine?</h4>
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
            </div>
          <button>save wine</button>
        </form>
      </main>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
import InputError from '@/Components/InputError.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import InputError from '@/Components/InputError.vue';
export default {
  name: 'Wine.CreateView',
  components: {
      Head,
      Link,
<<<<<<< HEAD
      InputError,
      GoBackButton
=======
      GoBackButton,
      InputError
>>>>>>> 0f87774561fc34b4fbb3a940103fe0fc873d2203
  },
  data () {
    return {
      form : useForm({
        name : '',
        type : '',
        country: '',
        price: '',
        size: '',
        cellar_id: this.cellars[0].id,
        cellar_qty: '0',
        buyList_qty: '',
      }),
    }
  },
  layout: MainLayout,
  methods: {
    submit () {
<<<<<<< HEAD
      this.wineForm.post(route('wine.store'), {
        onSuccess: () => {
          this.$parent.openDialog(`Great ! Your wine has been added`);
        }
    });
=======
      this.form.post(route('wine.store'), {
        onSuccess: () => {
          this.$parent.openDialog(
            'yeah! you created a wine'
          )
        }
      })
>>>>>>> 0f87774561fc34b4fbb3a940103fe0fc873d2203
    }
  },
  props: ['cellars']
}
</script>
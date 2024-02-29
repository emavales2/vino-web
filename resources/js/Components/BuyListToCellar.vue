<template>
  <div v-if="!showForm" class="confirm">
    <p>{{ actionMessage }}</p>
    <div>
      <button class="button btn-sml btn-coral" @click="toggleForm">{{ __('words.yes') }}, {{ yesMessage }}</button>
      <button class="button btn-sml btn-warning" @click="deleteWine">{{ __('words.no') }}, {{ noMessage }}</button>
    </div>
    <button class="button btn-sml btn-coral" @click="toggleModal">Cancel</button>
  </div>

  <form v-if=showForm @submit.prevent="submit" class="form-quantity variant-modal">         
    <section>
      <legend class="typo-fs-6 typo-display-font coral">{{ __('select') }}</legend>
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
    </section>
    <section>
      <button class="button btn-sml btn-coral">{{ __('actions.store') }}</button>
    </section>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import PlusButton from './ButtonsIcons/PlusButton.vue';
import MinusButton from './ButtonsIcons/MinusButton.vue';
import { Inertia } from '@inertiajs/inertia';

export default{
  name: 'BuyListToCellar',
  components:{
    PlusButton,
    MinusButton
  },
  data () {
    return {
      showForm: false,
      form : useForm({
        wine_id : this.wine.wine_id,
        quantity: this.wine.quantity,
        cellar_id: this.cellars[0].id
      })
    }
  },
  methods: {
    addOne () {
      if(this.form.quantity < this.wine.quantity) this.form.quantity ++
    },
    removeOne () {
      if(this.form.quantity > 1) this.form.quantity --
    },
    toggleForm () {
      if(this.cellars.length > 1 ) this.showForm = true
      else this.submit()
    },
    submit () {
      Inertia.delete(route('buylist.delete', { wine: this.wine.wine_id }), {
        onFinish: () => {
          this.toggleModal()
          this.form.post(route('cellarwine.store'), {
            onSuccess: () => {
              const cellarName = this.cellars.find(c => c.id == this.form.cellar_id).name
              this.openDialog(
                `${this.__('buylist.success_store_beg') + ' ' + this.wine.quantity + ' ' + this.__('buylist.success_store_mid') + ' ' + cellarName }`
              )
            }
          })
        }
      })
    },
    deleteWine () {
      Inertia.delete(route('buylist.delete', { wine: this.wine.wine_id }), {
        onSuccess: () => {
          this.openDialog(
              `${this.__('buylist.success_delete')}`
          );
        },
      })
      this.toggleModal()
    }
  },
  props:['cellars', 'wine','actionMessage', 'yesAction', 'altAction', 'yesMessage', 'noMessage', 'toggleModal', 'openDialog']
}
</script>

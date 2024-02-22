<template>
  <form @submit.prevent="addToCellar" class="form-quantity variant">         
    <h2>Store this wine in a cellar?</h2>
    <section>
      <legend class="fs_6 display-font coral">{{ __('select') }}</legend>
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
      <button class="button button_burgundy">Store all</button>
    </section>
      <section>
        Or choose how many bottles you want to store
          <div>
              <label for="quantity"></label>
              <input type="number" id="quantity" v-model="form.quantity">
              <div>
                <MinusButton 
                  :color="'burgundy'"
                  :removeAction="removeOne"
                  :disabled="form.quantity === 1" 
                />
                <PlusButton 
                  :color="'burgundy'" 
                  :addAction="addOne"
                  :disabled="form.quantity >= wine.quantity" 
                />
              </div>
          </div>
      </section>
      <button class="button button_burgundy">store</button>
  </form>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import PlusButton from './ButtonsIcons/PlusButton.vue';
import MinusButton from './ButtonsIcons/MinusButton.vue';
import { computed } from 'vue';
export default{
  name: 'BuyListToCellar',
  components:{
    PlusButton,
    MinusButton
  },
  data () {
    return {
      form : useForm({
        wine_id : this.wine.id,
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
    }
  },
  props:['cellars', 'wine']
}
</script>

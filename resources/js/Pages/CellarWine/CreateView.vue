<template>
  <main>
    <div>
      <GoBackButton :color="'cream'"/>
      <div v-if="cellars.length > 0">
        <h2 class="block-font txt-center coral">Add this wine to your cellar</h2>
        <form @submit.prevent="addToCellar" class="form-quantity">
          <h6 class="legend_small ">{{ wine.name }}</h6>
          <section>
            <figure><img :src="wine.photo" :alt="wine.name"></figure>
            <div>
              <label for="quantity"></label>
              <input type="number" id="quantity" v-model="form.quantity">
              <div>
                <MinusButton 
                  :color="'burgundy'"
                  :removeAction="removeOne"
                />
                <PlusButton 
                  :color="'burgundy'" 
                  :addAction="addOne"
                />
              </div>
            </div>
          </section>
          <section>
            <legend class="legend coral">Select a cellar</legend>
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
          <button class="button_burgundy">Add</button>
        </form>
      </div>
      <div v-else>
        <h1>Oh oh, seems like you have no cellar</h1>
        <Link class="button_burgundy" :href="route('cellar.create')">create a cellar</Link>
      </div>
    </div>
  </main>
</template>

<script>
import { useForm, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import PlusButton from '@/Components/ButtonsIcons/PlusButton.vue'
import MinusButton from '@/Components/ButtonsIcons/MinusButton.vue'
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue'

export default{
  name: 'AddForm',
  components: {
    Link,
    PlusButton,
    MinusButton,
    GoBackButton
  },
  data () {
    return {
      showDialog: false,
      message: '',
      showForm: false,
      selectedWine : '',
      form : useForm({
        wine_id : this.wine.id,
        quantity: '1',
        cellar_id: this.cellars[0].id
      })
    }
  },
  layout: MainLayout,
  methods: {
    addToCellar() {
      this.form.post(route('cellarwine.store'), {
        onSuccess: () => {
          const cellarName = this.cellars.find(c => c.id == this.form.cellar_id).name
          Inertia.get(route('wine.show', this.wine.id))
          this.$parent.openDialog(
            `Yeah! You just added ${this.form.quantity} bottle${this.form.quantity > 1 ? 's' : ''} to ${cellarName}`
          )
          this.closeForm()
        }
      })
    },
    closeForm () {
      this.showForm = false
      this.form.reset()
    },
    openForm (id) {
      this.form.reset()
      if(this.cellars[0]) {
        this.hasCellar = true;
        this.selectedWine = this.results.find(w => w.id === id)
        this.form.cellar_id = this.cellars[0].id
        this.form.wine_id = this.selectedWine.id
      }
      this.showForm = true
    },
    addOne () {
      this.form.quantity ++
    },
    removeOne () {
      if(this.form.quantity > 1) this.form.quantity --
    }
  },
  props: ['cellars', 'wine']
}
</script>
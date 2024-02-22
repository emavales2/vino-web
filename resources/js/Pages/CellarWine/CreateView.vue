<template>
    <Head title="Add Wine" />

    <div class="bckgd">
        <main>
            <GoBackButton :color="'cream'" class="button_back"/>

            <header>
                <h1 class="index_title">{{ __('cellar.add_wine_buylist') }}</h1>
            </header>

            <div v-if="cellars.length !== 0">    
                <form @submit.prevent="addToCellar" class="form-quantity">
                    <h2 class="block-font fiche_wine_title coral">{{ wine.name }}</h2>             
                    <section>
                        <figure><img :src="wine.photo" :alt="wine.name"></figure>
                        <div>
                            <label for="quantity"></label>
                            <input type="number" id="quantity" v-model="form.quantity">
                            
                            <div>
                                <MinusButton 
                                :color="'burgundy'"
                                :removeAction="removeOne"/>
                                <PlusButton 
                                :color="'burgundy'" 
                                :addAction="addOne"/>
                            </div>
                        </div>
                    </section>

                    <section class="column">
                        <legend class="fs_6 display-font coral">{{ __('cellar.select') }}</legend>
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
                            <InputError class="msg input_err" :message="form.errors.cellar_id" />
                          </div>
                        </div>
                    </section>
                    
                    <button class="button button_burgundy">{{ __('buttons.add') }}</button>
                </form>
            </div>
            <div v-else>
                <h2 class="disp_subtitle">{{ __('cellar.no_cellar') }}</h2>
                <Link class="button" :href="route('cellar.create')">{{ __('cellar.create') }}</Link>
            </div>
        </main>
    </div>
</template>

<script>
import { useForm, Link, Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import PlusButton from '@/Components/ButtonsIcons/PlusButton.vue'
import MinusButton from '@/Components/ButtonsIcons/MinusButton.vue'
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue'
import InputError from '@/Components/InputError.vue';

export default{
  name: 'AddForm',
  components: {
    Link,
    Head,
    PlusButton,
    MinusButton,
    GoBackButton,
    InputError
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
            `${this.trans.dialogue.yeah} ${this.form.quantity} ${this.trans.dialogue.bottle} ${this.form.quantity > 1 ? `${this.trans.dialogue.s}`  : `${this.trans.dialogue.vide}`} ${this.trans.dialogue.to}  ${cellarName}`
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
  props: ['cellars', 'wine', 'trans']
}
</script>
<template>
  <main class="main-default">
    <div class="mt-50">
      <GoBackButton :color="'cream'" />
      <h2 class="coral">Add this wine to your shopping list</h2>
      <form @submit.prevent="addToBuyList">
        <div class="form-quantity">
          <h6>{{ wineData.name }}</h6>
          <section>
            <figure><img :src="wineData.photo" :alt="wineData.name"></figure>
            <div>
              <label for="quantity"></label>
              <input type="number" id="quantity" v-model="form.quantity">
              <div>
                <MinusButton :color="'burgundy'" :removeAction="removeOne" />
                <PlusButton :color="'burgundy'" :addAction="addOne" />
              </div>
            </div>
          </section>
        </div>
        <button class="button">Add</button>
      </form>
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

export default {
  name: 'AddForm',
  components: {
    Link,
    PlusButton,
    MinusButton,
    GoBackButton
  },
  data() {
    return {
      showDialog: false,
      message: '',
      showForm: false,
      selectedWine: '',
      form: useForm({
        wine_id: this.wineData.id,
        quantity: '1'
      })
    }
  },
  layout: MainLayout,
  methods: {
    addToBuyList() {
      this.form.post(route('buylist.store'), {
        onSuccess: () => {
          this.$parent.openDialog(
            `Yeah! You just added ${this.form.quantity} bottle${this.form.quantity > 1 ? 's' : ''} to you shopping list`
          )
          this.closeForm()
        }
      })
    },
    closeForm() {
      this.showForm = false
      this.form.reset()
    },
    openForm(id) {
      this.form.reset()
      this.showForm = true
    },
    addOne() {
      this.form.quantity++
    },
    removeOne() {
      if (this.form.quantity > 1) this.form.quantity--
    }
  },
  props: ['wineData']
}
</script>
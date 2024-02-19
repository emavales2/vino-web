<template>
  <li class="wine-thumbnail">
    <Link :href="route('wine.show', wine.id)">
      <aside>
        <ColorDrop :class="setColor(wine.type)"/>
        <span v-if="quantity !== undefined" class="quantity-drop">
          {{ quantity }}
        </span>
      </aside>
      <div>
        <img 
        :src="wine.photo"
        :alt="wine.name"
        loading="lazy" 
      >
      </div>
      <div>
        <p v-if="wine.name.length > 30">
          {{ wine.name.replaceAll('/', ' ').slice(0, 30) }}...
        </p>
        <p v-else>
          {{ wine.name }}
        </p>        
      </div>
    </Link>
    <section v-if="addOne" class="row_els_apart">
      <MinusButton :color="'cream'" @click="removeOne(wine, quantity)"/>
      <PlusButton :color="'cream'" @click="addOne(wine, quantity)"/>
    </section>
    <slot />
    <button v-if="deleteWine" class="button sml" @click="deleteWine(wine)">remove wine</button>
  </li>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import ColorDrop from './ButtonsIcons/ColorDrop.vue'
import DeleteButton from './ButtonsIcons/DeleteButton.vue'
import PlusButton from './ButtonsIcons/PlusButton.vue'
import MinusButton from './ButtonsIcons/MinusButton.vue'
export default {
  name: 'WineThumbnail',
  components: {
    Link,
    ColorDrop,
    DeleteButton,
    MinusButton,
    PlusButton
},
  methods: {
    setColor (color) {
      if(color) return color.split(' ')[1]
    }
  },
  props:['wine', 'colorDrop', 'openForm', 'quantity', 'deleteAction', 'addOne', 'removeOne', 'deleteWine']
}
</script>
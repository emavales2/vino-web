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
    <div v-if="quantity !== undefined">
      <DeleteButton :color="'cream'" :deleteAction="deleteAction"/>
    </div>

  </li>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import ColorDrop from './ButtonsIcons/ColorDrop.vue'
import DeleteButton from './ButtonsIcons/DeleteButton.vue'
import { Inertia } from '@inertiajs/inertia';
export default {
  name: 'WineThumbnail',
  components: {
    Link,
    ColorDrop,
    DeleteButton
  },
  methods: {
    setColor (color) {
      if(color) return color.split(' ')[1]
    },
    deleteOne(wine) {
      Inertia.delete(route('buylist.delete', { wine: wine.id })
      //, {
        // onSuccess: () => {
        //   this.$parent.openDialog(
        //     `Wine ${wine.name} has been successfully removed from your shopping list.`
        //   )
        // }
      //}
      )
    },    
  },
  props:['wine', 'colorDrop', 'openForm', 'quantity', 'deleteAction']
}
</script>
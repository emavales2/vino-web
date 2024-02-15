<template>
  <li class="wine-thumbnail">
    <Link :href="route('wine.show', wine.id)">
      <ColorDrop :class="setColor(wine.type)"/> 
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
        <p v-if="wine.quantity !== undefined">
          {{ wine.quantity }} 
        </p>
      </div>
    </Link>
    <div v-if="wine.quantity !== undefined">
      <DeleteButton :color="'cream'" :deleteAction="() => deleteOne(wine)"/>
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
      if (confirm('Are you sure you want to delete this wine from your shopping list?')) {
        Inertia.delete(route('buylist.delete', { wine: wine.id }))
      }
    },    
  },
  props:['wine', 'colorDrop', 'openForm']
}
</script>
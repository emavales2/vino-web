<template>
  <li class="wine-thumbnail">
    <Link :href="route('wine.show', wine.id)">
      <ColorDrop :class="setColor(wine.type)"/> 
      <div>
        <img 
        :src="wine.photo" 
        loading="lazy" 
        :alt="wine.name"
        >
      </div>
      <div>
        <p v-if="wine.name.length > 30">
          {{ wine.name.slice(0, 30) }}...
        </p>
        <p v-else>{{ wine.name }}</p>
      </div>
    </Link>
  </li>
<!--   <BlobShape :shape="setShape"/> -->
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import ColorDrop from './ButtonsIcons/ColorDrop.vue'
export default {
  name: 'WineThumbnail',
  components: {
    Link,
    ColorDrop
  },
  methods: {
    setColor (color) {
      if(color) return color.split(' ')[1]
    },
    setShape () {
      return Math.floor(Math.random() * (5 - 1) + 1);
    }
  },
  props:['wine', 'colorDrop', 'openForm']
}
</script>
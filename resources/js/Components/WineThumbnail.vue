<template>
    <li class="wine-thumbnail">
        <!-- section principal du thumbnail(incluant nom, qté(si présent), image et bckgd) -->
        <Link :href="route('wine.show', wine.id)">
            <aside>
                <ColorDrop :color="wine.type"/>
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
                <p v-if="wine.price" class="wine-th-price">
                    {{ wine.price.toFixed(2) }} CAD
                </p>     
            </div>
        </Link>

        <!-- <slot> utilisé pour les sections contenant des boutons affectant le vin(BD et DOM) -->
        <slot />

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
  props:['wine', 'quantity']
}
</script>
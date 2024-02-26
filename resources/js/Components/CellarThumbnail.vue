<template>
    <div class="card_cellar">
        <!-- Cliquer sur la boite pour entrer dans cellier -->
        <Link :href="route('cellar.show', cellar.id)">
            
            <!-- To not overflow the text -->
            <span class="block-font burg" v-if="cellar.name.length > 30">
                {{ cellar.name.replaceAll('/', ' ').slice(0, 30) }}...
            </span>
            <span class="block-font burg" v-else>
                {{ cellar.name }}
            </span>  
        </Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    name: 'CellarThumbnail',
    components: {
        Link
    },
    props: ['cellar']
}
</script>
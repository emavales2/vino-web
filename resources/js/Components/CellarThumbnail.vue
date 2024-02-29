<template>
    <div class="card_cellar">
        <Link :href="route('cellar.show', cellar.id)">
            <span class="typo-block-font burg" v-if="cellar.name.length > 30">
                {{ cellar.name.replaceAll('/', ' ').slice(0, 30) }}...
            </span>
            <span class="typo-block-font burg" v-else>
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
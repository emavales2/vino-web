<template>
    <div class="card_cellar">
        <!-- Cliquer sur la boite pour entrer dans cellier -->
        <Link :href="route('cellar.show', cellar.id)"><h6>{{ cellar.name }}</h6></Link>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    name: 'CellarDisplayBox',
    components: {
        Link
    },
    props: ['cellar']
}
</script>
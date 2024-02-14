<template>
    <div class="card_cellar">
      <h6>{{ cellar.name }}</h6>
    </div>
    <!-- <Link :href="route('cellars.show', {cellar: cellar.id} )">Enter this cellar</Link>  -->
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
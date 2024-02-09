<template>
        <Head title="Error" />
        <div>
            <h1>Error</h1>
            <p>Something went wrong</p>
        </div>
        <button @click="goBack">Get me out of here</button>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';

export default {
    name: 'ErrorView',
    components: {
        Head
    },
    methods: {
        goBack() {
            window.history.back();
        }
    }
}
</script>
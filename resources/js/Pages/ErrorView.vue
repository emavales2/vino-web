<template>
    <MainLayout>
        <Head title="Error" />
        <div>
            <h1>Error</h1>
            <p>Something went wrong</p>
        </div>
    </MainLayout>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
    name: 'ErrorView',
    components: {
        Head,
        MainLayout
    }
}
</script>
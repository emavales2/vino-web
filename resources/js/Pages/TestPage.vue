<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
</script>
<template>
    <MainLayout>
        <div class="p-4">
            <h1 class="text-bold text-xl">Its working</h1>
            <p>on enlevera le tailwind des configs</p>
        </div>
    </MainLayout>
    <Head title="Test" />
</template>
// destroy
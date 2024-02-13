<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p>
            {{ message }}
        </p>
    </div>
</template>

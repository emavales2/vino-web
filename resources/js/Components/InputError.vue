<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
<<<<<<< HEAD
        <p>
=======
        <small class="text-sm text-red-600">
>>>>>>> 75a9cde044af1d04592db4fad5cf00fcfb2fbcab
            {{ message }}
        </small>
    </div>
</template>

<script setup>
import { defineProps, Head } from 'vue'
defineProps({
    user: Object
})
</script>

<template>
    <Head title="Profile" />
    <div>
        <h1>Profile</h1>
        <p>First Name: {{ user.first_name }}</p>
        <p>Last Name: {{ user.last_name }}</p>
        <p>Email: {{ user.email }}</p>
        <p>Role: {{ user.role }}</p>
        <p>Created At: {{ user.created_at }}</p>
        <p>Updated At: {{ user.updated_at }}</p>
    </div>
</template>

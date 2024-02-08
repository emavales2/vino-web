<script setup>
import { defineProps, Head } from 'vue'
defineProps({
    users: Array
})
</script>

<script>

</script>

<template>
    <Head title="Users" />
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.first_name + ' ' + user.last_name }} </td>
                <td>{{ user.email }}</td>
                <!-- <td>
                    <a href="#" @click="deleteUser(user)">Delete</a>
                </td> -->
            </tr>
        </tbody>
    </table>
</template>

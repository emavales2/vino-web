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
<script>
import { Head } from '@inertiajs/inertia-vue3';
defineProps({ users: Array });

export default {
    name: 'UsersView',
    components: {
        Head
    },
    methods: {
        deleteUser(user) {
            if (confirm('Are you sure you want to delete this user?')) {
                this.$inertia.delete(route('users.destroy', { user: user.id }));
            }
        }
    }
}
</script>
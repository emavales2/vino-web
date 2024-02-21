<template>
    <Head title="Users" />
    <header>
        <h1 class="index_title">Users</h1>
    </header>
    <table class="cream">
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
                <td>
                    <button class="button sml" @click="toggleModal(user.id)">Delete this user</button> 
                </td>
            </tr>
        </tbody>
    </table>
        <ConfirmModal v-show="openDeleteModal" 
            :YesAction="delete" 
            action="delete" 
            actionMessage="Are you sure you want to delete your account?" 
        />
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import ConfirmModal from '@/Components/ConfirmModal.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
    name: 'UsersView',
    components: {
        Head,
        ConfirmModal
    },
    data () {
        return {
            openDeleteModal: false,
            user: {
            id: null
            }
        }
    },
    layout: MainLayout,
    methods: {
        delete() {
            this.$inertia.delete(route('admin.delete', { user: this.user.id }));
            this.openDeleteModal = false;
        },
        toggleModal(userId) {
            this.user.id = userId;
            this.openDeleteModal = !this.openDeleteModal;
        }
    },
    props: ['users']
}
</script>
<template>
    <MainLayout>
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
                <td>
                    <button @click="toggleModal(user.id)">Delete this user</button> 
                </td>
            </tr>
        </tbody>
    </table>
        <ConfirmModal v-show="openDeleteModal" 
            :YesAction="delete" 
            action="delete" 
            actionMessage="Are you sure you want to delete your account?" 
        />
    </MainLayout>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3';
import ConfirmModal from '@/Components/ConfirmModal.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
    name: 'UsersView',
    components: {
        Head,
        MainLayout, 
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
    methods: {
        delete() {
            this.$inertia.delete(route('users.adminDelete', { user: this.user.id }));
            this.openDeleteModal = false;
        },
        toggleModal(userId) {
            this.user.id = userId;
            this.openDeleteModal = !this.openDeleteModal;
        }
    },
    props: {
        users: {
            type: Array,
        }
    }
}
</script>
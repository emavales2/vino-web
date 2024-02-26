<template>
    <Head title="Users" />
    <header>
        <h1 class="title_index">{{ __('user.users') }}</h1>
    </header>
    <table class="cream">
        <thead>
            <tr>
                <th>{{ __('user.id') }}</th>
                <th>{{ __('user.name') }}</th>
                <th>{{ __('user.email') }}</th>
                <th>{{ __('buttons.delete') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.first_name + ' ' + user.last_name }} </td>
                <td>{{ user.email }}</td>
                <td>
                    <button class="button btn-sml btn-coral" @click="toggleModal(user.id)">{{ __('user.delete_user') }}</button> 
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
<template>
    <Head title="Users" />
    <div class="bckgd">
        <main>
            <header>
                <h1 class="title_index">{{ __('user.users') }}</h1>
            </header>
            <table class="table-admin">
                <thead>
                    <tr>
                        <th>{{ __('user.id') }}</th>
                        <th>{{ __('user.email') }}</th>
                        <th>{{ __('buttons.delete') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <td>{{ user.id }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <button class="button btn-sml btn-coral" @click="toggleModal(user.id)">{{ __('buttons.delete') }}</button> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
    <Modal
        v-show="openDeleteModal"
        :toggleOff="toggleModal"
    >
    <ConfirmModal  
            :toggleModal="toggleModal"
            :YesAction="delete" 
            :action="__('buttons.delete')" 
            :actionMessage="__('user.delete_user')" 
        />
    </Modal>
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
            this.$inertia.delete(route('admin.delete', { user: this.user.id }), {
                onSuccess: () => {
                    this.$parent.openDialog(this.__('user.success_delete'));
                },
            });
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
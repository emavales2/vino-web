<template>
        <Head title="Edit Profile" />
        <div>
            <h1>Edit Profile</h1>
            <form @submit.prevent="submit">
                <div>
                    <label for="first_name">First Name</label>
                    <input id="first_name" v-model="form.first_name" type="text" />
                    <p v-if="form.errors.first_name" class="error">{{ form.errors.first_name }}</p>
                </div>
                <div>
                    <label for="last_name">Last Name</label>
                    <input id="last_name" v-model="form.last_name" type="text" />
                    <p v-if="form.errors.last_name" class="error">{{ form.errors.last_name }}</p>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" v-model="form.email" type="email" />
                    <p v-if="form.errors.email" class="error">{{ form.errors.email }}</p>
                </div>
                <input type="hidden" v-model="form.id" />
                <div>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
        <button @click="toggleModal">Delete your account</button> 
        <Link :href="route('profile.show',  {user: user.id} )">Go back</Link>
        <ConfirmModal 
            v-show="openDeleteModal" 
            :YesAction="delete" 
            action="delete" 
            actionMessage="Are you sure you want to delete your account?" 
        />
</template>


<script>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import ConfirmModal from '@/Components/ConfirmModal.vue';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
    name: 'EditView',
    components: {
        Head,
        ConfirmModal,
        Link
    },
    computed () {

    },
    data () {
        return {
            form: useForm({
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                email: this.user.email,
                id: this.user.id,
                errors: {}
            }),
            openDeleteModal: false
        }
    },
    layout: MainLayout,
    methods: {
        submit() {
            this.form.put(route('profile.update', {user: this.user.id}), this.form);
        },
        toggleModal() {
            this.openDeleteModal = !this.openDeleteModal;
        },
        delete() {
            this.form.delete(route('users.delete', {user: this.user.id}));
            this.openDeleteModal = false;
        }
    },
    props: ['user']

}
</script>
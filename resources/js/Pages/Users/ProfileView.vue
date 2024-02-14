<template>
    <MainLayout :user="user">
        <Head title="Profile" />
        <p v-if="success" class="alert alert-success">{{ success }}</p>
        <GoBackButton/>
        <div>
            <h1>Profile</h1>
            <p>First Name: {{ user.first_name }}</p>
            <p>Last Name: {{ user.last_name }}</p>
            <p>Email: {{ user.email }}</p>
        </div>
        <Link :href="route('profile.edit',  {user: user.id} )">Edit your profile</Link>
        <PrimaryButton @click="logout">Logout</PrimaryButton>
    </MainLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import GoBackButton from '@/Components/GoBackButton.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
    name: 'ProfileView',
    components: {
    Head,
    GoBackButton,
    Link,
    MainLayout,
    PrimaryButton
    },
    methods: {
        logout() {
            Inertia.post(route('logout'));
        }
    },
    props: ['user', 'errors', 'success']
}
</script>
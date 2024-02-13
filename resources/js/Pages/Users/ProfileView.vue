<template>
    <MainLayout>
        <Head title="Profile" />
        <GoBackButton/>
        <div>
            <h1>Profile</h1>
            <p>First Name: {{ user.first_name }}</p>
            <p>Last Name: {{ user.last_name }}</p>
            <p>Email: {{ user.email }}</p>
        </div>
        <Link :href="route('profile.edit',  {user: user.id} )">Edit your profile</Link>
    </MainLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import GoBackButton from '@/Components/GoBackButton.vue';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
    name: 'ProfileView',
    components: {
    Head,
    GoBackButton,
    Link,
    MainLayout
},
    props: {
        user: {
            type: Object,
        }
    }
}
</script>
<template>
    <Head title="Dashboard Admin" />
    <MainLayout>
    <div class="p-4">
        <h1 class="text-bold text-xl mb-6">Welcome {{ user.first_name }}</h1> 
        <nav class="mb-6">
            <ul>
                <li>
                    <Link :href="route('users.index')">Show all users</Link>
                </li>
                <li>
                    <button @click="logout">Logout</button>
                </li>
            </ul>
        </nav>
        Statistics and other stuff
    </div>
    </MainLayout>
</template>

<script>
import { Head, Link  } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: 'DashboardView',
    components: {
        Head,
        Link,
        MainLayout
    },
    methods: {
        logout() {
            Inertia.post(route('logout'));
        }
    },
    props: ['user']
}
</script>

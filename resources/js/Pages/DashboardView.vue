<template>
    <Head title="Dashboard" />
    <MainLayout>
    <div class="p-4">
        <h1 class="text-bold text-xl mb-6">Welcome {{ user.first_name }}</h1> 
        <nav class="mb-6">
            <ul>
                <li>
                    <Link :href="route('profile.show',  {user: user.id} )">Profile</Link>
                </li>
                <li>
                    <button @click="logout">Logout</button>
                </li>
            </ul>
        </nav>

        <main>
            <ul>
                <li>Cellars</li>
                <li>Collection</li>
                <li>Shopping list</li>
                <li>Notes</li>
            </ul>
        </main>
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
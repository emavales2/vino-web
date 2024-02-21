<template>
    <Head title="Dashboard Admin" />
    <div class="bckgd">
        <header>
            <h1 class="index_title">Welcome {{ user.first_name }}</h1> 
        </header>
        <main class="mb-6">
            <ul>
                <li>
                    <button class="button" >
                        <Link :href="route('users.index')">Show all users</Link>
                    </button>
                </li>
                <li>
                    <button class="button"  @click="logout">Logout</button>
                </li>
            </ul>
        </main>
    </div>
</template>

<script>
import { Head, Link  } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: 'DashboardView',
    components: {
        Head,
        Link
    },
    layout: MainLayout,
    methods: {
        logout() {
            Inertia.post(route('logout'));
        }
    },
    props: ['user']
}
</script>

<template>
    <Head title="Home" />
    <MainLayout>
        <div class="p-4">
            <h1 class="text-bold text-xl mb-6">Welcome VINO {{ status }}</h1>
            <nav>
                <ul>
                    <li>
                        <Link :href="route('login')">Login</Link>
                    </li>
                    <li>
                        <Link :href="route('register')">Register</Link>
                    </li>
                </ul>
            </nav>
        </div>
    </MainLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
    name: 'HomeView',
    components: {
        Head,
        Link,
        MainLayout
    },
    props: ['status']
}
</script>
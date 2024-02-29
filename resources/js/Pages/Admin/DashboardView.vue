<template>
    <Head title="Dashboard Admin" />
    <div class="bckgd">
        <main>
            <header>
                <h1 class="title_index">{{ __('dashboard.welcome') }} {{ user.first_name }}</h1> 
            </header>

            <button class="button btn-cream" >
                <Link :href="route('users.index')">{{ __('user.show_users') }}</Link>
            </button>
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

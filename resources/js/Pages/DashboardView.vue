<template>
    <Head title="Dashboard" />

    <MainLayout>
        <!-- <div> -->
            <!-- <SearchBar/> -->
            <h1>Welcome, {{ user.first_name }}</h1>
            
            <!-- This is actually a SUB NAV; ACTUAL NAV IS IN MainLayout.vue setp file -->
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
            <!-- FIN SUB NAV -->

            <div>
                <ul class="column">
                    <li>
                        <section>
                            <h5>My Cellars</h5>
                            <div class=""></div>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h5>My Wine Collection</h5>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h5>My Shopping Lists</h5>
                        </section>
                    </li>
                    <li>
                        <section>
                            <h5>My Notes</h5>
                        </section>
                    </li>
                </ul>
            </div>
        <!-- </div> -->
    </MainLayout>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
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
    // props: {
    //     user: Object
    // }
}
</script>
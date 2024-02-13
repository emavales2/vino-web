<template>
    <Head title="Dashboard" />

    <MainLayout :user="user">
        <div class="burg_bg under_nav">
            <!-- <SearchBar/> -->
            
            
            <div class="card_low">
                <header class="index_title">
                    <h4 class="display-font">Welcome, {{ user.first_name }}</h4>
                </header>
                
                <div class="cream_lt_bg card_round">
                    <main class="column">
                    <!-- This is actually a SUB NAV; ACTUAL NAV IS IN MainLayout.vue setp file -->
                    <!-- <aside>     
                        <ul>
                            <li>
                                <Link :href="route('profile.show',  {user: user.id} )">Profile</Link>
                            </li>
                            <li>
                                <button @click="logout">Logout</button>
                            </li>
                        </ul>
                    </aside> -->
                    <!-- FIN SUB NAV -->

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
                </main>
            </div>
            </div>
        </div>
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
}
</script>
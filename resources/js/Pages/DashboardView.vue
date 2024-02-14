<template>
    <Head title="Dashboard" />
        <div class="burg_bg under_nav">
            <div class="card_low">
                <header class="index_title">
                    <h2 class="block-font">Welcome, {{ user.first_name }}</h2>
                </header>
                <div>
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
                            <section class="column">
                                <h5 class="display-font">My Cellars</h5>
                                <li v-if="cellars" class="container_cards">
                                    <ul v-for="cellar in cellars" :key="cellar.id">
                                        <CellarDisplayBox :cellar="cellar"/>
                                    </ul>
                                </li>
                                <!-- si plus que 3 cellars, afficher un bouton "voir plus" -->
                                <li v-else>
                                    <p>You have no cellars yet.</p>
                                </li>
                                </section>
                        </li>
                        <li>
                            <section>
                                <h5 class="display-font">My Wine Collection</h5>
                            </section>
                        </li>
                        <li>
                            <section>
                                <h5 class="display-font">My Shopping Lists</h5>
                            </section>
                        </li>
                        <li>
                            <section>
                                <h5 class="display-font">My Notes</h5>
                            </section>
                        </li>
                    </ul>
                </main>
            </div>
            </div>
        </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
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
    props: ['user', 'cellars']
}
</script>
<template>
        <div class="under_nav">
            <Head title="Dashboard" />
            <div class="card_low">
                <header class="index_title">
                    <h2 class="block-font">Welcome, {{ user.first_name }}</h2>
                </header>
                <div>
                    <main>
                    <ul>
                        <li>
                            <section class="container_dashboard_section">
                                <h5 class="display-font">My Cellars</h5>
                                <li v-if="!isEmpty(cellars)" class="container_cards">
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
                            <section class="container_dashboard_section">
                                <h5 class="display-font">My Wine Collection</h5>
                                <li v-if="!isEmpty(wines)">
                                    <ul>
                                        <li v-for="wine in wines" :key="wine.id">
                                            <WineThumbnail :wine="wine" />
                                        </li>
                                    </ul>
                                </li>
                                <li v-else>
                                    <p>You have no wines yet.</p>
                                </li>
                            </section>
                        </li>
                        <li>
                            <section class="container_dashboard_section">
                                <h5 class="display-font">My Shopping Lists</h5>
                            </section>
                        </li>
                        <li>
                            <section class="container_dashboard_section">
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
import CellarDisplayBox from '@/Components/CellarDisplayBox.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import WineThumbnail from '@/Components/WineThumbnail.vue';

export default {
    name: 'DashboardView',
    components: {
        CellarDisplayBox,
        Head,
        Link,
        WineThumbnail
    },
    layout: MainLayout,
    methods: {
        logout() {
            Inertia.post(route('logout'));
        },
        isEmpty(obj) {
            return Object.keys(obj).length === 0;
        }
    },
    props: ['user', 'cellars', 'wines']
}
</script>
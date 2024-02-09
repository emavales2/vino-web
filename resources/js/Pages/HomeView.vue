<template>
    <Head title="Home" />
        <div class="p-4">
            <header>
                <h1 class="text-bold text-xl mb-6">Welcome VINO</h1>
                <p>Unlock the Perfect Cellar Experience with Vino</p>
                <p>Your Personal Wine Sanctuary</p>
            </header>
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
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'HomeView',
    components: {
        Head,
        Link
    },
}
</script>
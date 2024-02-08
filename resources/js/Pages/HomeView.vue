<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    // canLogin: Boolean,
    // canRegister: Boolean
    status: String
});

const logout = () => {
  Inertia.post(route('logout'));
}

</script>
<template>
    <Head title="Home" />
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
</template>


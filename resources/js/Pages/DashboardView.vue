<script setup>
import { Head, Link, defineProps} from '@inertiajs/inertia-vue3';
defineProps({ user: Object });
</script>

<template>
    <Head title="Dashboard" />
    <div class="p-4">
        <h1 class="text-bold text-xl mb-6">Welcome {{ user.first_name }}</h1> 
        <nav class="mb-6">
            <ul>
                <li>
                    <Link :href="route('users.show',  {user: user.id} )">Profile</Link>
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
</template>

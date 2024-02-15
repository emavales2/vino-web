<template>
  <Head title="Profile" />
  <div>
    <h1>Profile</h1>
    <p>First Name: {{ user.first_name }}</p>
    <p>Last Name: {{ user.last_name }}</p>
    <p>Email: {{ user.email }}</p>

  </div>
  <Link :href="route('profile.edit', user.id )">Edit your profile</Link>
  <Link :href="route('logout', user.id )">Logout</Link>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import MainLayout from '@/Layouts/MainLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
  name: 'ProfileView',
  components: {
      Head,
      Link
  },
  layout: MainLayout,
  props: ['user', 'success']
}
</script>
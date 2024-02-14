<template>
  <Head title="Profile" />
  <div>
    <h1>Profile</h1>
    <p>First Name: {{ user.first_name }}</p>
    <p>Last Name: {{ user.last_name }}</p>
    <p>Email: {{ user.email }}</p>
    <p>{{ success }}</p>
  </div>
  <Link :href="route('profile.edit', user.id )">Edit your profile</Link>
  <Link :href="route('logout', user.id )">Logout</Link>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
  name: 'ProfileView',
  components: {
      Head,
      Link
  },
  onMounted() {
    if(this.success){
      this.$parent.openDialog(
          ``
      )
    }
  },
  layout: MainLayout,
  props: ['user', 'success']
}
</script>
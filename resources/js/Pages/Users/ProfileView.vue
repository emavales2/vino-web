<template>
  <Head title="Profile" />
  <div class="under_nav card_mid">
    <header class="index_title">
        <h2>Profile</h2>
      </header>
      <main class="column container_profil">
        <dl>
          <dt class="display-font">First Name</dt>
          <dd>{{ user.first_name }}</dd>
          <dt class="display-font">Last Name</dt>
          <dd>{{ user.last_name }}</dd>
          <dt class="display-font">Email</dt>
          <dd>{{ user.email }}</dd>
        </dl>
        <div class="btn-container">
          <Link class="button" :href="route('profile.edit', user.id )">Edit your profile</Link>
          <Link class="button" :href="route('logout', user.id )">Logout</Link>
          <GoBackButton />
        </div>
    </main>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import GoBackButton from '@/Components/GoBackButton.vue';

export default {
  name: 'ProfileView',
  components: {
    Head,
    Link,
    GoBackButton
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
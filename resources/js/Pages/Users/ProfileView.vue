<template>
  <Head title="Profile" />

  <div class="bckgd">
    <section class="background_blobs">
        <figure class="fig_bg">
            <img src="@/../assets/img/blob_top.svg" class="coral_blob_bg" alt="">    
        </figure>
    </section>

    <main class="container_profil">
    <!-- <main class="column cont_narrow_splash"> -->
        <header class="title-center">
            <h2 class="block-font txt-center coral">Profile</h2>
        </header>

        <dl class="txt-center">
            <span class="flex-row gap_20">
                <dt class="display-font">First Name</dt>
                <dd>{{ user.first_name }}</dd>
            </span>

            <span class="flex-row gap_20">
                <dt class="display-font">Last Name</dt>
            <dd>{{ user.last_name }}</dd>
            </span>

            <span class="flex-row gap_20">
                <dt class="display-font">Email</dt>
            <dd>{{ user.email }}</dd>
            </span>        
        </dl>

        <div class="btn-container">
          <Link class="button" :href="route('profile.edit', user.id )">Edit profile</Link>
          <Link class="button" :href="route('logout', user.id )">Logout</Link>
          <GoBackButton color="cream"/>
        </div>

    </main>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';

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
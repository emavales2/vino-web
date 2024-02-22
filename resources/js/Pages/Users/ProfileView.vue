<template>
    <Head title="Profile" />

    <div class="bckgd">
        <main>
            <GoBackButton :color="'cream'" class="button_back"/>
            <header>
                <h1 class="index_title">Profile</h1>
            </header>

            <div>
                <dl class="txt-center">
                    <span class="flex-row gap_20">
                        <dt class="display-font coral">First Name</dt>
                        <dd class="cream block-font">{{ user.first_name }}</dd>
                    </span>

                    <span class="flex-row gap_20">
                        <dt class="display-font coral">Last Name</dt>
                        <dd class="cream block-font">{{ user.last_name }}</dd>
                    </span>

                    <span class="flex-row gap_20">
                        <dt class="display-font coral">Email</dt>
                        <dd class="cream block-font">{{ user.email }}</dd>
                    </span>        
                </dl>
            </div>

            <dl class="cream">
                <dt>App language :</dt>
                {{ __('auth.failed') }}
                <LanguageSelector/>
            </dl>
            <div class="btn-container">
                <Link class="button" :href="route('profile.edit', user.id )">Edit profile</Link>
                <Link class="button" :href="route('logout', user.id )">Logout</Link>
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
  layout: MainLayout,
  props: ['user', 'locale']
}
</script>
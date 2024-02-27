<template>
    <Head title="Profile" />

    <div class="bckgd">
        <main>
            <GoBackButton :color="'cream'"/>
            <header>
                <h1 class="title_index">{{ __('user.profile') }}</h1>
            </header>

            <div>
                <dl class="txt-center">
                    <span class="flex-row gap_20">
                        <dt class="typo-display-font coral">{{ __('user.first_name') }}</dt>
                        <dd class="cream typo-block-font">{{ user.first_name }}</dd>
                    </span>

                    <span class="flex-row gap_20">
                        <dt class="typo-display-font coral">{{ __('user.last_name') }}</dt>
                        <dd class="cream typo-block-font">{{ user.last_name }}</dd>
                    </span>

                    <span class="flex-row gap_20">
                        <dt class="typo-display-font coral">{{__('user.email')}}</dt>
                        <dd class="cream typo-block-font">{{ user.email }}</dd>
                    </span>        
                </dl>
            </div>

            <div class="btn-container">
                <Link class="button btn-cream" :href="route('profile.edit', user.id )">{{ __('user.edit_profile') }}</Link>
                <Link class="button btn-cream" :href="route('logout', user.id )">{{ __('buttons.logout') }}</Link>
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
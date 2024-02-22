<template>
    <Head title="Home" />

    
    <div class="marg_vert_home"> 
        <!-- ---- * En dessus de body, le conteneur principale. Au dessous du page content * ---- -->
        <div class="bckgd bckgd-home">
            <!-- ---- * Contenu décoratif du bg (flat). Pas d'interaction avec page content * ---- -->
            <section class="background_blobs bb_home">
                <figure class="fig_bg">
                    <img src="@/../assets/img/coral_1.svg" class="coral_blob_bg" alt="">    
                </figure>

                <figure class="fig_bg">
                    <img src="@/../assets/img/med_vino.svg" class="med_blob_bg" alt="">
                </figure>

                <figure class="fig_bg">
                    <img src="@/../assets/img/dark_vino.svg" class="dkvin_blob_bg" alt="">
                </figure>
            </section>

            <main class="cont_narrow_splash just_top">
                <header>
                    <figure>
                        <img src="@/../assets/logos/VINO_lt.svg" alt="VINO logo">
                    </figure>

                    <span class="title-center">
                        <h1 class="fs_5 block-font txt-center coral">{{ __('home.sub') }}<br>{{ __('home.sub2') }}</h1>
                    </span>
                </header>
                <div class="button_column">             
                    <button class="button">
                        <Link :href="route('login')">
                            {{ __('home.sign') }}
                        </Link>
                    </button>

                    <p class="cream txt-center">
                        {{ __('home.no_account') }}
                        <Link class="block-font coral" :href="route('register')">{{ __('home.join') }}</Link>
                       
                    </p>
                    <p class="cream txt-center"> 
                        {{ __('home.switch') }}
                        <LanguageSelector/>
                    </p>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import LanguageSelector from '@/Components/LanguageSelector';
export default {
    name: 'HomeView',
    components: {
        Head,
        Link,
        LanguageSelector,
    },
}
</script>
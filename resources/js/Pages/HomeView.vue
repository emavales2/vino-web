<template>
    <Head title="Home" />

    
    <div class="marg_vert_home"> 
        <!-- ---- * En dessus de body, le conteneur principale. Au dessous du page content * ---- -->
        <div class="bckgd bckgd-home">
            <!-- ---- * Contenu décoratif du bg (flat). Pas d'interaction avec page content * ---- -->
            <section class="blobs_bckgd blobs_bckgd_home">
                <figure class="fig_bg">
                    <img src="@/../assets/img/coral_1.svg" class="blob_coral_bg" alt="decoration element">    
                </figure>

                <figure class="fig_bg">
                    <img src="@/../assets/img/med_vino.svg" class="blob_med_bg" alt="decoration element">
                </figure>

                <figure class="fig_bg">
                    <img src="@/../assets/img/dark_vino.svg" class="blob_burg_bg" alt="decoration element">
                </figure>
            </section>

            <main class="cont_narrow_splash just_top">
                <header>
                    <figure>
                        <img src="@/../assets/logos/VINO_lt.svg" alt="VINO logo">
                    </figure>

                    <span class="cont-center">
                        <h1 class="typo-fs-5 typo-block-font txt-center coral">{{ __('home.sub') }}<br>{{ __('home.sub2') }}</h1>
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
                        <Link class="typo-block-font coral" :href="route('register')">{{ __('home.join') }}</Link>
                       
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
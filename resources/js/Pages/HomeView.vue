<template>
    <Head title="Home" />

    
    <!-- <div class="bckgd">  -->
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
                <header class="column_15">
                    <figure class="logo">
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

                    <aside class="txt-center">
                        <p class="cream">
                            {{ __('home.no_account') }}
                        </p>
                        <p class="txt-center">
                            <Link class="typo-block-font coral" :href="route('register')">{{ __('home.join') }}</Link>   
                        </p>   
                    </aside>
                    
                    <p class="cream txt-center"> 
                        {{ __('home.switch') }}
                        <LanguageSelector/>
                    </p>
                </div>
            </main>
        </div>
    <!-- </div> -->
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
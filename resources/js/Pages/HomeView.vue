<template>
    <Head title="Home" />

        <!-- ---- * En dessus de body, le conteneur principale. Au dessous du page content * ---- -->
        <div class="bckgd cream-lt">
            <!-- ---- * Contenu décoratif du bg (flat). Pas d'interaction avec page content * ---- -->
            <section class="background_blobs">
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
                        <img src="@/../assets/logos/VINO_lt.svg" alt="">
                    </figure>

                    <span class="title-center">
                        <h5 class="block-font txt-center coral">Your Personal<br>Wine Sanctuary</h5>
                    </span>
                </header>
                <div class="button_column">             
                    <button class="button">
                        <Link :href="route('login')">
                            Sign In
                        </Link>
                    </button>

                    <p class="cream txt-center">
                        Don't have an account yet?
                        <Link class="block-font coral" :href="route('register')">Sign Up!</Link>
                    </p>
                </div>
            </main>
        </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    name: 'HomeView',
    components: {
        Head,
        Link
    },
}
</script>
// keep
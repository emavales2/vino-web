<template>
    <Head title="Home" />
        <div class="cream_lt_bg">
            <section class="background_blobs">
                <figure class="fig_bg">
                    <img src="../../img/coral_1.svg" class="coral_blob_bg" alt="">
                </figure>

                <figure class="fig_bg">
                    <img src="../../img/med_vino.svg" class="med_blob_bg" alt="">
                </figure>

                <figure class="fig_bg">
                    <img src="../../img/dark_vino.svg" class="dkvin_blob_bg" alt="">
                </figure>
            </section>

            <main class="cont_narrow_splash just_top">
                <header>
                    <figure>
                        <img src="../../logos/VINO_lt.svg" alt="">
                    </figure>

                    <!-- <h1 class="block-font">Welcome</h1> -->
                    <!-- <p>Unlock the Perfect Cellar Experience with Vino</p> -->
                    <h5 class="block-font txt-center coral">Your Personal <br>Wine Sanctuary</h5>
                </header>
                <div class="button_column">             
                    <button>
                        <Link :href="route('login')">
                            <h6 class="">Sign In</h6>
                        </Link>
                    </button>

                    <button>
                        <Link :href="route('register')">
                            <h6>Sign Up</h6>
                        </Link>
                    </button>           
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
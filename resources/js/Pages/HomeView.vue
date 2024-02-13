<template>
    <Head title="Home" />
        <div class="burg_bg">
            <main class="cont_narrow_splash">
                <header>
                    <figure>
                        <img src="../../logos/VINO_lt.svg" alt="">
                    </figure>

                    <!-- <h1 class="block-font">Welcome</h1> -->
                    <!-- <p>Unlock the Perfect Cellar Experience with Vino</p> -->
                    <h5 class="block-font txt-center coral">Your Personal Wine Sanctuary</h5>
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
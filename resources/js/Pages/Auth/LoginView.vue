<template>
    <Head title="Log in" />

    <div class="bckgd marg_vert_home">
        <main>
            <header>
                <!-- <figure>   
                </figure> --> 
                <h1 class="cream block-font fs_1">Sign In</h1>
                <h2 class="fs_5 block-font coral">Unlock the Perfect Cellar Experience with Vino</h2>               
            </header>

            <form @submit.prevent="submit">
                <fieldset class="fieldset_1">
                    <legend aria-labelledby="email">Email Address</legend>
                    <label for="email" value="Email" hidden></label>
                    <input
                        id="email"
                        type="email"
                        class=""
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="your email address"
                    />
                    <InputError class="msg input_err" :message="form.errors.email" />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="password">Password</legend>
                    <label for="password" value="Password" hidden></label>
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="your password"
                    />
                    <InputError class="msg input_err" :message="form.errors.password" />
                </fieldset>
                    
                <button class="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Sign In
                </button>
            </form>

            <aside class="col_tight">
                <p class="cream txt-center">
                    Don't have an account yet?<br>
                    <Link class="block-font coral" :href="route('register')">Sign Up!</Link>
                </p>
            </aside>
        </main>
    </div>
</template>
// keep

<script>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    name: 'LoginView',
    components: {
        Head,
        InputError,
        Link,
        PrimaryButton,
    },
    data () {
        return {
            form: useForm({
                email: '',
                password: '',
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route('login'), {
                onFinish: () => this.form.reset('password'),
            });
        },
    },
}
</script>

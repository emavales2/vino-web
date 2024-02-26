<template>
    <Head title="Log in" />

    <div class="bckgd marg_vert_home">
        <main>
            <header>
                <!-- <figure>   
                </figure> --> 
                <h1 class="cream typo-block-font typo-fs-1">{{ __('home.sign') }}</h1>
                <h2 class="typo-fs-5 typo-block-font coral">{{ __('home.sub_sign') }}</h2>               
            </header>

            <form @submit.prevent="submit">
                <fieldset class="fieldset_1">
                    <legend aria-labelledby="email">{{ __('home.email') }}</legend>
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
                    <InputError class="auto_msg auto_msg_input_err" :message="form.errors.email" />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="password">{{ __('home.password') }}</legend>
                    <label for="password" value="Password" hidden></label>
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="your password"
                    />
                    <InputError class="auto_msg auto_msg_input_err" :message="form.errors.password" />
                </fieldset>
                    
                <button class="button" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ __('home.sign') }}
                </button>
            </form>

            <aside class="col_tight">
                <p class="cream txt-center">
                    {{ __('home.no_account') }}<br>
                    <Link class="typo-block-font coral" :href="route('register')">{{ __('home.join') }}</Link>
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

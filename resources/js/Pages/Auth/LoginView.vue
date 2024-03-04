<template>
    <Head title="Log in" />

    <div class="bckgd cont_marg_vert_home">
        <main>
            <header>
                <!-- <figure>   
                </figure> --> 
                <h1 class="cream typo-block-font typo-fs-1">{{ __('home.sign') }}</h1>
                <h2 class="typo-fs-5 typo-block-font coral">{{ __('home.sub_sign') }}</h2>               
            </header>

            <form @submit.prevent="submit">
                <div class="form_wrapper_2">
                    <label for="email" value="Email">{{ __('home.email') }}</label>
                    <input
                        id="email"
                        type="email"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        :placeholder="__('home.email')"
                    />
                    <InputError class="auto_msg auto_msg_input_err" :message="form.errors.email" />
                </div>

                <div class="form_wrapper_2">
                    <label for="password" value="Password">{{ __('home.password') }}</label>
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        :placeholder="__('home.password')"
                    />
                    <InputError class="auto_msg auto_msg_input_err" :message="form.errors.password" />
                </div>
                    
                <button class="button btn-cream" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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

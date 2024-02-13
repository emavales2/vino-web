<template>
    <Head title="Log in" />
    <div class="burg_bg">
        <main>
            <header>
                <!-- <figure>   
                </figure> --> 
                <h1 class="block-font txt-center cream">Sign In</h1>
                <h5 class="block-font txt-center coral">Unlock the Perfect Cellar Experience with Vino</h5>               
            </header>

            <form @submit.prevent="submit">
                <fieldset>
                    <InputLabel for="email" value="Email" class="invisible" />
                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="email"
                    />
                    <InputError class=".input_err" :message="form.errors.email" />
                </fieldset>

                <fieldset class="mt-4">
                    <InputLabel for="password" value="Password" class="invisible"  />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="password"
                    />
                    <InputError class=".input_err" :message="form.errors.password" />
                </fieldset>
                <PrimaryButton class="mt-4">
                    <h6>Sign In</h6>
                </PrimaryButton>
            </form>

            <aside class="col_tight">
                <small class="cream txt-center">
                    Don't have an account yet?
                    <Link class="block-font coral" :href="route('register')">Sign Up!</Link>
                </small>
            </aside>
        </main>
    </div>
</template>

<script>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    name: 'LoginView',
    components: {
        Head,
        InputError,
        InputLabel,
        TextInput,
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
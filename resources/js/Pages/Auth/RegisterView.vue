<template>
        <Head title="Register" />
        <div class="burg_bg">
            <main>
                <header> 
                    <h1 class="block-font txt-center coral">Sign Up</h1>
                </header>
                <form @submit.prevent="submit">
                    <fieldset>
                        <label for="first_name" value="First name" class="invisible" />
                        <input
                        id="first_name"
                        type="text"
                        class=""
                        v-model="form.first_name"
                        required
                        autofocus
                        autocomplete="first_name"
                        placeholder="First name"
                        />
                        <InputError class="input_err" :message="form.errors.first_name" />
                    </fieldset>

                    <fieldset>
                        <label for="last_name" value="Last name" class="invisible"></label>
                        <input
                            id="last_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.last_name"
                            required
                            autofocus
                            autocomplete="last_name"
                            placeholder="last name"
                        />
                        <InputError class="input_err" :message="form.errors.last_name" />
                    </fieldset>
                    <fieldset>
                        <label for="email" value="Email" class="invisible"></label>
                        <input
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                            placeholder="email address"
                        />
                        <InputError class="input_err" :message="form.errors.email" />
                    </fieldset>
                    <fieldset>
                        <label for="password" value="Password" class="invisible"></label>
                        <input
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                            placeholder="password"
                        />
                        <InputError class="input_err" :message="form.errors.password" />
                    </fieldset>
                    <fieldset>
                        <label for="password_confirmation" value="Confirm Password" class="invisible"></label>
                        <input
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="confirm password"
                        />
                        <InputError class="input_err" :message="form.errors.password_confirmation" />
                    </fieldset>
                    <PrimaryButton type="submit" class="mt-4"><h6>Save</h6></PrimaryButton>
                </form>
                <small class="cream txt-center">
                    Already have a member account?
                    <Link class="block-font coral" :href="route('login')">Sign In!</Link>
                </small>
            </main>
        </div>
    </template>

<script>
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    name: 'RegisterView',
    components: {
    Head,
    InputError,
    Link,
    PrimaryButton,
},
    data () {
        return {
            form: useForm({
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            });
        },
    }
}
</script>

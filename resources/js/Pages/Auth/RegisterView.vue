<template>
        <Head title="Register" />
        <div class="burg_bg">
            <main>
                <header> 
                    <h1 class="block-font txt-center coral">Sign Up</h1>
                </header>
                <form @submit.prevent="submit">
                    <fieldset>
                        <InputLabel for="first_name" value="First name" class="invisible" />
                        <TextInput
                            id="first_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.first_name"
                            required
                            autofocus
                            autocomplete="first_name"
                            placeholder="first name"
                        />
                        <InputError class="input_err" :message="form.errors.first_name" />
                    </fieldset>

                    <fieldset>
                        <InputLabel for="last_name" value="Last name" class="invisible" />
                        <TextInput
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
                        <InputLabel for="email" value="Email" class="invisible" />

                        <TextInput
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
                        <InputLabel for="password" value="Password" class="invisible" />
                        <TextInput
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
                        <InputLabel for="password_confirmation" value="Confirm Password" class="invisible" />
                        <TextInput
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
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

export default {
    name: 'RegisterView',
    components: {
    Head,
    InputError,
    InputLabel,
    Link,
    PrimaryButton,
    TextInput
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

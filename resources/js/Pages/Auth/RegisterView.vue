<template>
    <Head title="Register" />

    <div class="bckgd marg_vert_home">
        <main>
            <header>
                <h1 class="title_index">{{ __('home.join') }}</h1>
            </header>

            <form @submit.prevent="submit">
                <fieldset class="fieldset_1">
                    <legend aria-labelledby="first_name">{{ __('home.first_name') }}</legend>
                    <label for="first_name" value="First name"></label>
                    <input
                        id="first_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.first_name"
                        required
                        autofocus
                        autocomplete="first_name"
                        placeholder="first name"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.first_name"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="last_name">{{ __('home.last_name') }}</legend>
                    <label for="last_name" value="Last name"></label>
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
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.last_name"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="email">{{ __('home.email') }}</legend>
                    <label for="email" value="Email"></label>
                    <input
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                        placeholder="email address"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.email"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="password">{{ __('home.password') }}</legend>
                    <label for="password" value="Password" hidden></label>
                    <input
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                        placeholder="password"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.password"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="password_confirmation">{{ __('home.confirm_password') }}</legend>
                    <label for="password_confirmation" value="Confirm Password" hidden></label>
                    <input
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="confirm password"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.password_confirmation"
                    />
                </fieldset>
                
                <div class="flex items-center justify-end">
                    <button
                        class="button btn-cream"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        {{ __('buttons.save') }}
                    </button>
                </div>
            </form>
            <p class="cream txt-center">
                {{ __('home.already_account') }}<br />
                <Link class="typo-block-font coral" :href="route('login')"
                    >{{ __('home.sign') }}</Link
                >
            </p>
        </main>
    </div>
</template>

<script>
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

export default {
    name: "RegisterView",
    components: {
        Head,
        InputError,
        Link,
        PrimaryButton
    },
    data() {
        return {
            form: useForm({
                first_name: "",
                last_name: "",
                email: "",
                password: "",
                password_confirmation: "",
            }),
            registerDialog: this.trans.dialogue.registerDialog,
        };
    },
    methods: {
        submit() {
            this.form.post(route("register"));
        },
    },
    props: ['trans']
};
</script>

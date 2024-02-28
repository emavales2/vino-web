<template>
    <Head title="Register" />

    <div class="bckgd marg_vert_home">
        <main>
            <header>
                <h1 class="title_index">{{ __('home.join') }}</h1>
            </header>

            <form @submit.prevent="submit">
                <div class="form_wrapper_2">
                    <label for="first_name" value="First name">{{ __('home.first_name') }}</label>
                    <input
                        id="first_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.first_name"
                        required
                        autofocus
                        autocomplete="first_name"
                        :placeholder="__('home.first_name')"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.first_name"
                    />
                </div>

                <div class="form_wrapper_2">
                    <label for="last_name" value="Last name">{{ __('home.last_name') }}</label>
                    <input
                        id="last_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.last_name"
                        required
                        autofocus
                        autocomplete="last_name"
                        :placeholder=" __('home.last_name')"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.last_name"
                    />
                </div>

                <div class="form_wrapper_2">
                    <label for="email" value="Email">{{ __('home.email') }}</label>
                    <input
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                        :placeholder="__('home.email')"
                    />
                    <InputError
                        class="auto_msg auto_msg_input_err"
                        :message="form.errors.email"
                    />
                </div>

                <div class="form_wrapper_2">
                    <label for="password" value="Password">{{ __('home.password') }}</label>
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
                </div>

                <div class="form_wrapper_2">
                    <label for="password_confirmation" value="Confirm Password">{{ __('home.confirm_password') }}</label>
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
                </div>
                
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

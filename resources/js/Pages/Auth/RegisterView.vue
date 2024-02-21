<template>
    <Head title="Register" />

    <div class="bckgd marg_vert_home">
        <main>
            <header>
                <h1 class="index_title">Sign Up</h1>
            </header>

            <form @submit.prevent="submit">
                <fieldset class="fieldset_1">
                    <legend aria-labelledby="first_name">First Name</legend>
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
                        class="msg input_err"
                        :message="form.errors.first_name"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="last_name">Last Name</legend>
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
                        class="msg input_err"
                        :message="form.errors.last_name"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="email">Email Address</legend>
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
                        class="msg input_err"
                        :message="form.errors.email"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="password">Password</legend>
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
                        class="msg input_err"
                        :message="form.errors.password"
                    />
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="password_confirmation">Password Confirmation</legend>
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
                        class="msg input_err"
                        :message="form.errors.password_confirmation"
                    />
                </fieldset>
                
                <div class="flex items-center justify-end">
                    <button
                        class="button"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Save
                    </button>
                </div>
            </form>
            <p class="cream txt-center">
                Already have a member account?<br />
                <Link class="block-font coral" :href="route('login')"
                    >Sign In!</Link
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
        PrimaryButton,
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
        };
    },
    methods: {
        submit() {
            this.form.post(route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>

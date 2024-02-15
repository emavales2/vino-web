<template>
    <Head title="Register" />
        <main>
            <header> 
                <h1 class="block-font txt-center coral">Sign Up</h1>
                <!-- <h5 class="block-font txt-center coral">Unlock the Perfect Cellar Experience with Vino</h5>                -->
            </header>
            <form @submit.prevent="submit">
                <fieldset>
                    <label for="first_name" value="First name" hidden></label>
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
                    <InputError class="msg input_err" :message="form.errors.first_name" />
                </fieldset>
                <fieldset>
                    <label for="last_name" value="Last name" hidden></label>
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
                    <InputError class="msg input_err" :message="form.errors.last_name" />
                </fieldset>
                
                <fieldset>
                    <label for="email" value="Email" hidden></label>
                    <input
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                        placeholder="email address"
                    />
                    <InputError class="msg input_err" :message="form.errors.email" />
                </fieldset>
                <fieldset>
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
                    <InputError class="msg input_err" :message="form.errors.password" />
                </fieldset>
                <fieldset>
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
                    <InputError class="msg input_err" :message="form.errors.password_confirmation" />
                </fieldset>
                <div class="flex items-center justify-end mt-4">
                    
                    <button class="button"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Save
                    </button>
                </div>
            </form>
        
            <p class="cream txt-center">
                Already have a member account?<br>
                <Link class="block-font coral" :href="route('login')">Sign In!</Link>
            </p>
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
    PrimaryButton
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

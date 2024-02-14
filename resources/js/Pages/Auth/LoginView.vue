<script setup>
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    // import PrimaryButton from '@/Components/PrimaryButton.vue';
    // import TextInput from '@/Components/TextInput.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });

    const form = useForm({
        email: '',
        password: '',
    });

    // Appelle la route login pour se connecter
    const submit = () => {
        form.post(route('login'), {
            onFinish: () => form.reset('password'),
        });
    };
</script>

<template>
    <Head title="Log in" />

    <div v-if="status" class=" msg status">
        {{ status }}
    </div>
    
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
                    <InputLabel for="email" value="Email" />
                    <input
                        id="email"
                        type="email"
                        class=""
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="email"
                    />
                    <InputError class="msg input_err" :message="form.errors.email" />
                </fieldset>

                <fieldset>
                    <InputLabel for="password" value="Password" />
                    <input
                        id="password"
                        type="password"
                        class=""
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        placeholder="password"
                    />
                    <InputError class="msg input_err" :message="form.errors.password" />
                </fieldset>
                    
                <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Sign In</button>
            </form>

            <aside class="col_tight">
                <p class="cream txt-center">          
                    <Link class="block-font" :href="route('password.request')">Forgot your password?</Link>
                </p>

                <p class="cream txt-center">
                    Don't have an account yet?<br>
                    <Link class="block-font coral" :href="route('register')">Sign Up!</Link>
                </p>
            </aside>
        </main>
    </div>
</template>

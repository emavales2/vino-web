<template>
    <Head title="Edit Profile" />
    <div>
        <main>
            <header>
                <h2 class="block-font txt-center coral">Edit Profile</h2>
            </header>
            <form @submit.prevent="submit">
                <div>
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
                        class="input_err"
                        :message="form.errors.first_name"
                    />
                </div>
                <div>
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
                        class="input_err"
                        :message="form.errors.last_name"
                    />
                </div>
                <div>
                    <label for="email" value="Email" class="invisible"></label>
                    <input
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="email address"
                    />
                    <InputError
                        class="input_err"
                        :message="form.errors.email"
                    />
                </div>
                <input type="hidden" v-model="form.id" />
                <div>
                    <button class="button success" type="submit">Save</button>
                </div>
            </form>
            <div class="btn-container">
                <button class="button" @click="toggleModal">
                    Delete your account
                </button>
                <GoBackButton :color="'cream'" />
            </div>
        </main>
    </div>
    <ConfirmModal
        v-show="openDeleteModal"
        :YesAction="delete"
        action="delete"
        actionMessage="Are you sure you want to delete your account?"
    />
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ConfirmModal from "@/Components/ConfirmModal.vue";
import GoBackButton from "@/Components/ButtonsIcons/GoBackButton.vue";
import InputError from "@/Components/InputError.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "EditView",
    components: {
        Head,
        ConfirmModal,
        GoBackButton,
        Link,
        MainLayout,
        InputError,
    },
    data() {
        return {
            form: useForm({
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                email: this.user.email,
                id: this.user.id,
                errors: {},
            }),
            openDeleteModal: false,
        };
    },
    layout: MainLayout,
    methods: {
        submit() {
            this.form.put(route("profile.update", { user: this.user.id }), {
                onSuccess: () => {
                    this.$parent.openDialog(
                        `Great ! Your profile has been updated`
                    );
                },
            });
        },
        toggleModal() {
            this.openDeleteModal = !this.openDeleteModal;
        },
        delete() {
            this.form.delete(route("users.delete", { user: this.user.id }), {
                onSuccess: () => {
                    this.$parent.openDialog(`Your account has been deleted`);
                },
            });
            this.openDeleteModal = false;
        },
    },
    props: ["user"],
};
</script>

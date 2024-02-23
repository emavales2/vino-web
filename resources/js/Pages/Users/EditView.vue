<template>
    <Head title="Edit Profile" />
    <div>
        <main>
            <GoBackButton :color="'cream'" class="button_back"/>
            <header>
                <h1 class="index_title">{{ __('user.edit_profile') }}</h1>
            </header>
            <form @submit.prevent="submit">
                <fieldset class="fieldset_1">
                    <legend aria-labelledby="first_name">{{ __('user.first_name') }}</legend>
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
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="last_name">{{ __('user.last_name') }}</legend>
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
                </fieldset>

                <fieldset class="fieldset_1">
                    <legend aria-labelledby="email">{{ __('user.email') }}</legend>
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
                </fieldset>

                <input type="hidden" v-model="form.id" />
                
                <div>
                    <button class="button success" type="submit">{{ __('buttons.save') }}</button>
                </div>
            </form>

            <div class="btn-container">
                <button class="button" @click="toggleModal">
                    {{ __('user.delete_account') }}
                </button>
            </div>
        </main>
    </div>
    <Modal
        v-show="openDeleteModal"
        :toggleOff="toggleModal"
    >
        <ConfirmModal
            :toggleModal="toggleModal"
            :YesAction="delete"
            :action="modalAction"
            :actionMessage="modalMessage"
        />
    </Modal>
</template>

<script>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ConfirmModal from "@/Components/ConfirmModal.vue";
import GoBackButton from "@/Components/ButtonsIcons/GoBackButton.vue";
import InputError from "@/Components/InputError.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import Modal from "@/Components/Modal.vue";

export default {
    name: "EditView",
    components: {
        Head,
        ConfirmModal,
        GoBackButton,
        Link,
        MainLayout,
        InputError,
        Modal
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
            message: null,
            modalMessage: this.trans.dialogue.delete_account,
            modalAction: this.trans.dialogue.delete
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
    props: ["user", 'trans'],
};
</script>

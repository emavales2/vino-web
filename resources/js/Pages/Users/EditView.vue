<template>
    <MainLayout>
        <Head title="Edit Profile" />
        <div>
            <h1>Edit Profile</h1>
            <form @submit.prevent="submit">
                <div>
                    <label for="first_name">First Name</label>
                    <input id="first_name" v-model="form.first_name" type="text" />
                </div>
                <div>
                    <label for="last_name">Last Name</label>
                    <input id="last_name" v-model="form.last_name" type="text" />
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" v-model="form.email" type="email" />
                </div>
                <input type="hidden" v-model="form.id" />
                <div>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
        <Link :href="route('profile.show',  {user: user.id} )">Go back</Link>
    </MainLayout>
</template>


<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
    name: 'EditView',
    components: {
        Head,
        Link,
        MainLayout
    },
    computed () {

    },
    data () {
        return {
            form: {
                first_name: this.user.first_name,
                last_name: this.user.last_name,
                email: this.user.email,
                id: this.user.id
            }
        }
    },
    methods: {
        submit() {
            this.$inertia.put(route('profile.update', {user: this.user.id}), this.form);
        }
    },
    props: ['user']

}
</script>
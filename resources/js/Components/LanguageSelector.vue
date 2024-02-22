<template>
    <div class="ml-4">
        <div v-if="this.$page.props.locale == 'en'" @click="toggleLocale('fr')">FR</div>
        <div v-else @click="toggleLocale('en')">EN</div>
    </div>
</template>

<script>
export default {
    methods: {
        toggleLocale($locale) {
            this.$inertia.get(route('lang', { locale: $locale }));
        }
    },
};
</script>

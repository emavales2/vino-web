<template>
    <div class="ml-4">
        <p>{{ this.$page.props.locale }}</p>
        <div @click="toggleLocale('fr')">FR</div>
        <div @click="toggleLocale('en')">EN</div>

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

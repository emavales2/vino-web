<!-- faire nouveau fichier Button et passer en props la class et le type -->
<template>
    <button
        :type="type"
    >
        <slot />
    </button>
</template>

<script>
export default {
    name: 'PrimaryButton',
    props: ['type']
};
</script>
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

<template>
    <input
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
// destroy

<script>
export default {
    props: ['modelValue'],
    data() {
        return {
            input: null
        };
    },
    emits: ['update:modelValue'],
    mounted() {
        if (this.$refs.input.hasAttribute('autofocus')) {
            this.$refs.input.focus();
        }
    },
    methods: {
        focus() {
            this.$refs.input.focus();
        }
    }

};
</script>

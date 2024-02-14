<template>
    <div v-show="message">
        <small>
            {{ message }}
        </small>
    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>
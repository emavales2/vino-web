<template>
    <div v-show="message">
        <small>
            {{ message }}
        </small>
    </div>
</template>
// keep

<script>
export default {
    props: ['message']
}
</script>

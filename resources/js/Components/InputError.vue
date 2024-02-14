<template>
    <div v-show="message">
        <p>
            {{ message }}
        </small>
    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>
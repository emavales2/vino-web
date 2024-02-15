<template>
    <div v-show="message">
        <small  class="msg input_err">
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

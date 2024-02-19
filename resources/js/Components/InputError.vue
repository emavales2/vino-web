<template>
    <div v-show="message">
        <small  class="msg input_err">
            {{ message }}
        </small>
    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>

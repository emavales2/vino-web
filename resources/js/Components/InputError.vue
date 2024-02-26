<template>
    <div v-show="message">
        <small  class="auto_msg auto_msg_input_err">
            {{ message }}
        </small>
    </div>
</template>

<script>
export default {
    props: ['message']
}
</script>

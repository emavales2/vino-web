<template>
    <div id="confirmModal" class="confirm">
            <p>{{ actionMessage }}</p>
            <div>
                <button class="button sml" @click="YesAction">Yes, {{ action }}</button>
                <button class="button sml" @click="closeModal">Cancel</button>
            </div>
        </div>
</template>

<script>
export default {
    name: 'ConfirmModal',
    methods: {
        closeModal() {
            document.getElementById('confirmModal').style.display = 'none';
        },
    },
    props: ['YesAction', 'action', 'actionMessage']
}
</script>

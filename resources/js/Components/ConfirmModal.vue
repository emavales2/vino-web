<template>
    <div id="confirmModal" class="modal">
            <div class="modal-content">
                <p>{{ actionMessage }}</p>
                <div>
                    <button @click="YesAction">Yes, {{ action }}</button>
                    <button @click="closeModal">Cancel</button>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: 'ConfirmModal',
    methods: {
        closeModal() {
           /*  this.$el */
            document.getElementById('confirmModal').style.display = 'none';
        },
    },
    props: ['YesAction', 'action', 'actionMessage']
}
</script>

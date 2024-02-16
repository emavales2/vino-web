<template>
    <button @click="addAction" type="button">
        <!-- SVG ICI -->
    </button>
</template>

<script>
export default {
    name: 'EditButton',
    data () {
        return {
            fill: '#420101',
        }
    },
    mounted () {
        switch (this.color) {
            case 'cream':
                this.fill = '#F2D9AF'
                break;
            case 'burgundy':
                this.fill = '#2B0303'
            default:
                this.fill = '#420101'
                break;
        }
    },
    props:['color', 'addAction']
}
</script>
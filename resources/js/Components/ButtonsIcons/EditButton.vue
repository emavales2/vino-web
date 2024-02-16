<template>
    <button @click="addAction" type="button">
        <svg  width="25" height="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 25">
            <path d="m24.13,4.07l-3.2-3.2c-1.16-1.16-3.05-1.16-4.21,0L1.8,15.79s-.06.06-.09.1h0s.04-.05.04-.05c-.2.16-.4.42-.48.66l-.31,1.69h0S.02,23.43.02,23.43c-.08.43.06.87.37,1.18h.01c.31.32.76.46,1.2.37l4.84-.98,2.09-.42c.27-.06.5-.18.68-.37l14.92-14.92c1.16-1.16,1.16-3.05,0-4.21Zm-9.31,2.92l3.18,3.18-8.33,8.33-2.41-.72-.65-2.55L14.82,6.99Zm7.19-.83l-1.89,1.89-3.18-3.18,1.87-1.87,3.2,3.17ZM3.4,21.54l.5-2.8.02-.14.16-.85.05-.05.42,1.65c.07.27.21.5.39.69.17.17.39.3.63.38l1.39.42-1.14.23-2.44.49Z" fill="#f2d9af"/>
        </svg>
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
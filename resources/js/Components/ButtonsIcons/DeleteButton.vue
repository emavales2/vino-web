<template>
  <button @click="deleteAction" type="button">
    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18.27 36.54C8.19 36.54 0 28.34 0 18.27C0 8.2 8.19 0 18.27 0C28.35 0 36.54 8.19 36.54 18.27C36.54 28.35 28.34 36.54 18.27 36.54ZM18.27 3C9.85 3 3 9.85 3 18.27C3 26.69 9.85 33.54 18.27 33.54C26.69 33.54 33.54 26.69 33.54 18.27C33.54 9.85 26.69 3 18.27 3Z" :fill="fill"/>
      <path d="M25.5871 13.0692L13.0642 25.5921C12.4773 26.179 11.5298 26.179 10.9429 25.5921C10.356 25.0052 10.356 24.0577 10.9429 23.4708L23.4658 10.9479C24.0527 10.361 25.0002 10.361 25.5871 10.9479C26.174 11.5348 26.174 12.4823 25.5871 13.0692Z" :fill="fill"/>
      <path d="M24.5835 25.7048L12.0606 13.182C11.4737 12.5951 11.4737 11.6476 12.0606 11.0607C12.6475 10.4738 13.5951 10.4738 14.182 11.0607L26.7048 23.5835C27.2917 24.1704 27.2917 25.1179 26.7048 25.7048C26.1179 26.2917 25.1704 26.2917 24.5835 25.7048Z" :fill="fill"/>
    </svg>
  </button>
</template>

<script>
export default {
  name: 'DeleteButton',
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
  props:['color', 'deleteAction']
}
</script>
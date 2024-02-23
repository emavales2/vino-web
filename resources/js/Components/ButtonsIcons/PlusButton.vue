<template>
  <button @click="addAction" type="button" class="button--icon">
    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M18.27 36.54C8.19 36.54 0 28.34 0 18.27C0 8.2 8.19 0 18.27 0C28.35 0 36.54 8.19 36.54 18.27C36.54 28.35 28.34 36.54 18.27 36.54ZM18.27 3C9.85 3 3 9.85 3 18.27C3 26.69 9.85 33.54 18.27 33.54C26.69 33.54 33.54 26.69 33.54 18.27C33.54 9.85 26.69 3 18.27 3Z" :fill="fill"/>
      <path d="M18.27 28.62C17.44 28.62 16.77 27.95 16.77 27.12V9.41C16.77 8.58 17.44 7.91 18.27 7.91C19.1 7.91 19.77 8.58 19.77 9.41V27.12C19.77 27.95 19.1 28.62 18.27 28.62Z" :fill="fill"/>
      <path d="M27.12 19.77H9.41C8.58 19.77 7.91 19.1 7.91 18.27C7.91 17.44 8.58 16.77 9.41 16.77H27.12C27.95 16.77 28.62 17.44 28.62 18.27C28.62 19.1 27.95 19.77 27.12 19.77Z" :fill="fill"/>
    </svg>  
  </button>
</template>

<script>
export default {
  name: 'PlusButton',
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
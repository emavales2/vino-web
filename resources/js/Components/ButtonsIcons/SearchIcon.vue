<template>
  <button @click="searchAction" class="search-button" title="search" type="button">
    <svg  width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.98 20" :fill="fill">
      <path d="m12.48,0c-4.14,0-7.5,3.36-7.5,7.5,0,1.54.46,2.96,1.25,4.15L.44,17.44c-.59.58-.59,1.54,0,2.12.29.29.68.44,1.06.44s.77-.15,1.06-.44l5.8-5.8c1.18.79,2.6,1.24,4.12,1.24,4.14,0,7.5-3.36,7.5-7.5S16.62,0,12.48,0Zm0,12c-.69,0-1.34-.15-1.92-.44-.93-.43-1.68-1.18-2.12-2.11-.3-.59-.46-1.25-.46-1.95,0-2.48,2.02-4.5,4.5-4.5s4.5,2.02,4.5,4.5-2.02,4.5-4.5,4.5Z" />
    </svg>
  </button>
</template>

<script>
export default {
  name:'searchIcon',
  data () {
    return {
      fill: '#F2D9AF',
    }
  },
  mounted () {
    switch (this.color) {
      case 'cream':
        this.fill = '#F2D9AF'
        break;
      case 'burgundy':
        this.fill = '#2B0303'
        break;
      default:
        this.fill = '#420101'
        break;
    }
  },
  props: ['searchAction', 'color']
} 
</script>

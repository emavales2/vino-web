<template>
  <button @click="goBack" type="button" class="button--icon" aria-label="retour a la page précédente">
    <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M18.27 36.54C8.19 36.54 0 28.34 0 18.27C0 8.2 8.19 0 18.27 0C28.35 0 36.54 8.19 36.54 18.27C36.54 28.35 28.34 36.54 18.27 36.54ZM18.27 3C9.85 3 3 9.85 3 18.27C3 26.69 9.85 33.54 18.27 33.54C26.69 33.54 33.54 26.69 33.54 18.27C33.54 9.85 26.69 3 18.27 3Z" :fill="fill"/>
    <path d="M27.12 19.77H9.41C8.58 19.77 7.91 19.1 7.91 18.27C7.91 17.44 8.58 16.77 9.41 16.77H27.12C27.95 16.77 28.62 17.44 28.62 18.27C28.62 19.1 27.95 19.77 27.12 19.77Z" :fill="fill"/>
    <path d="M16.43 25.91C16.08 25.91 15.73 25.79 15.44 25.54L8.42 19.4C8.09 19.12 7.91 18.7 7.91 18.27C7.91 17.84 8.1 17.43 8.42 17.14L15.44 11C16.06 10.45 17.01 10.52 17.56 11.14C18.11 11.76 18.04 12.71 17.42 13.26L11.69 18.27L17.42 23.28C18.04 23.83 18.11 24.77 17.56 25.4C17.26 25.74 16.85 25.91 16.43 25.91Z" :fill="fill"/>
  </svg>
  </button>
</template>

<script>
export default {
  name: 'GoBackButton',
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
      case 'coral':
        this.fill = '#F95148'
        break;
      case 'coral-dk':
        this.fill = '#cb3a32'
        break;
      case 'burgundy':
        this.fill = '#2B0303'
      default:
        this.fill = '#420101'
        break;
    }
  },
  methods: {
    goBack () {
      history.back()
    }
  },
  props: ['color']
}
</script>

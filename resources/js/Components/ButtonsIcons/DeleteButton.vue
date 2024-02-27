<template>
  <button aria-label="supprimer" @click="deleteAction" type="button" class="button--icon">
      <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M18.27 36.54C8.19 36.54 0 28.34 0 18.27C0 8.2 8.19 0 18.27 0C28.35 0 36.54 8.19 36.54 18.27C36.54 28.35 28.34 36.54 18.27 36.54ZM18.27 3C9.85 3 3 9.85 3 18.27C3 26.69 9.85 33.54 18.27 33.54C26.69 33.54 33.54 26.69 33.54 18.27C33.54 9.85 26.69 3 18.27 3Z" :fill="fill"/>
        <path d="M25.7048 13.182L13.182 25.7049C12.5951 26.2918 11.6476 26.2918 11.0607 25.7049C10.4738 25.118 10.4738 24.1704 11.0607 23.5835L23.5835 11.0607C24.1704 10.4738 25.1179 10.4738 25.7048 11.0607C26.2917 11.6476 26.2917 12.5951 25.7048 13.182Z" :fill="fill"/>
        <path d="M23.5835 25.7048L11.0607 13.182C10.4738 12.5951 10.4738 11.6476 11.0607 11.0607C11.6476 10.4738 12.5951 10.4738 13.182 11.0607L25.7048 23.5835C26.2917 24.1704 26.2917 25.1179 25.7048 25.7048C25.1179 26.2917 24.1704 26.2917 23.5835 25.7048Z" :fill="fill"/>
      </svg>
  </button>
</template>

<script>
export default {
  name: 'DeleteButton',
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
      default:
        this.fill = '#420101'
        break;
    }
  },
  props:['color', 'deleteAction']
}
</script>
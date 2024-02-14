<template>
  <div class="modal" @click="closeModal">
    <slot/>
  </div>
</template>
<script>
export default {
  name: 'modal',
  methods: { 
    closeModal (e) {
      if(e.target === this.$el) this.toggleOff()
    }
  },
  props: ['toggleOff']
}
</script>
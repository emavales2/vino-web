<template>
  <div v-show="show" class="modal">
    <slot/>>
  </div>
</template>
<script>
export default {
  name: 'modal'
}
</script>
<template>
  <Transition name="inScreenOut">
    <div class="dialog">
      <p>{{ message }}</p>
    </div>
  </Transition>
</template>

<script>
export default{
  name:'dialog-window',
  props: ['message']
}
</script>

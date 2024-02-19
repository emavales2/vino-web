<template>
  <div id="confirmModal" class="confirm">
    <p>{{ actionMessage }}</p>
    <div>
      <button class="button sml" @click="YesAction">Yes, {{ action }}</button>
      <button class="button sml" @click="toggleModal">Cancel</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ConfirmModal',
  props: ['YesAction', 'action', 'actionMessage', 'toggleModal']
}
</script>

<template>
  <div id="confirmModal" class="confirm">
    <p>{{ actionMessage }}</p>
    <div>
      <button class="button button-sml" @click="YesAction">{{ __('buttons.yes') }}, {{ action }}</button>
      <button class="button button-sml" @click="toggleModal">{{ __('buttons.cancel') }}</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ConfirmModal',
  props: ['YesAction', 'action', 'actionMessage', 'toggleModal']
}
</script>

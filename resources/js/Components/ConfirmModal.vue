<template>
  <div id="confirmModal" class="confirm">
    <p>{{ actionMessage }}</p>
    <div>
      <button class="button btn-sml btn-warning" @click="YesAction">{{ __('buttons.yes') }}, {{ action }}</button>
      <button class="button btn-coral btn-sml" @click="toggleModal">{{ __('buttons.cancel') }}</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ConfirmModal',
  props: ['YesAction', 'action', 'actionMessage', 'toggleModal']
}
</script>

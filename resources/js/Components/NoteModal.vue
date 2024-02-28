<template>
  <article class="note-file">
    <div>
      <header>
        <h2>{{ __('note.time_beg') }} <time>{{ date }}</time> {{ __('note.time_end') }}</h2>
        <h3>{{ wine.name }}</h3>
      </header>
      <p>{{ note.note }}</p>
    </div>
    <div>
      <button class="button btn-warning btn-sml" @click="openConfirm">{{__('actions.delete')}}</button>
      <button class="button btn-coral btn-sml" @click="closeModal">{{__('actions.cancel')}}</button>
    </div>
  </article>
</template>
<script>
export default {
  name: 'Note.Thumbnail',
  props:['note', 'wine', 'date', 'openConfirm', 'closeModal']
}
</script>
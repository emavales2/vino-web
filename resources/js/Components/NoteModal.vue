<template>
  <article class="note-file">
    <div>
      <header>
        <h2>your tasting on <time>{{ date }}</time> for</h2>
        <h3>{{ wine.name }}</h3>
      </header>
      <p>{{ note.note }}</p>
    </div>
    <button class="button btn-warning btn-sml" @click="openConfirm">delete</button>
    <button class="button btn-coral btn-sml" @click="closeModal">cancel</button>
  </article>
</template>
<script>
export default {
  name: 'Note.Thumbnail',
  props:['note', 'wine', 'date', 'openConfirm', 'closeModal']
}
</script>
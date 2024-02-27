<template>
  <article class="note-file">
    <div>
      <header>
        <h2>your tasting on <time>{{ date }}</time></h2>
        <h3>for {{ wine.name }}</h3>
      </header>
      <p>{{ note.note }}</p>
    </div>
    <button class="button btn-warning btn-sml">delete</button>
  </article>
</template>
<script>
export default {
  name: 'Note.Thumbnail',
  props:['note', 'wine', 'date']
}
</script>
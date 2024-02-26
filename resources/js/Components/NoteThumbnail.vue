<template>
  <article class="note-thumbnail">
    <time><strong>On </strong>{{ this.setDate() }}</time>
    <p>{{ note.note }}</p>
  </article>
</template>
<script>
export default {
  name: 'Note.Thumbnail',
  methods: {
    setDate () {
      const date = new Date(this.note.updated_at)
      return date.toLocaleString('en-us', { day:'numeric', month: 'long', year:'numeric' })
    }
  },
  props:['note']
}
</script>
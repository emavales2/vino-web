<template>
    <article class="note-thumbnail">
      <div>
        <p>{{ note.note }}</p>
        <div>
          <strong>{{__('note.commented')}}</strong> 
          <time>{{ this.date }}</time>
        </div>
      </div>
    </article>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
  name: 'Note.Thumbnail',
  components: {
    Link
  },
  props:['note', 'date']
}
</script>
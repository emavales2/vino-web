<template>
  <Head title="Note" />
  <main>
    <GoBackButton :color="'cream'"/>

    <header>
      <h1 class="index_title">{{ __('note.wine_index_title') }}</h1>
      <h2>{{ __('words.for') }} {{ wine.name }}</h2>
    </header>
    <Link 
      :href="route('note.create', wine.id)"
      class="button"
    >
      new note
    </Link>
    <section v-if="notes.length !== 0">
      <div v-for="(note,i) in notes">
        {{ note.note }}
      </div>
    </section>
    <section v-else>
      <p class="no_show">
        {{ __("dialogue.no_notes") }}.
    </p>
    </section>
  </main>
</template>
<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';

import { Head, Link } from '@inertiajs/inertia-vue3';
export default {
  name:'Note.WineIndexView',
  components: {
    Head,
    Link,
    GoBackButton
  },
  layout: MainLayout,
  props: ['notes', 'wine']
}
</script>

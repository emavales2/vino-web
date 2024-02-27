<template>
  <div>
    {{ note.note }}
    {{ wine.name }}
  </div>
</template>
<script>
import MainLayout from '@/Layouts/MainLayout.vue';

export default {
  layout: MainLayout,
  props: ['note', 'wine']
}
</script>

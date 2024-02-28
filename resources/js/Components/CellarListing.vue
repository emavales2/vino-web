<template>
  <section class="column_20">

    <ul v-if="!isEmpty(cellars)" class="grid_square_horiz">
      <li class="grid_sq_insert" v-for="(cellar, index) in cellars.slice(0, limit ? limit : cellars.length)" :key="cellar.id">
        <CellarThumbnail :cellar="cellar" />
      </li>
    </ul>

    <p class="auto_msg_no_show" v-else><strong>{{ __('dialogue.oh') }}</strong> {{ __('dialogue.no_cellar') }}</p>
  </section>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import CellarThumbnail from "@/Components/CellarThumbnail.vue";

export default {
  name: 'CellarListing',
  components: {
    CellarThumbnail,
    Link
  },
  props: ['cellars', 'limit'],
  methods: {
    isEmpty(obj) {
      return Object.keys(obj).length === 0;
    }
  }
}
</script>

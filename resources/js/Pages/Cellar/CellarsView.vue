<template>
  <Head title="Cellars" />
  <header class="index_title">
    <h2>List of Cellars</h2>
  </header>
  <main class="main-default">
    <div>
      <Link class="button sml" :href="route('cellar.create')">Add Cellar</Link>
    </div>
    <table v-if="cellars.length > 0">
      <tr class="bckgd-coral">
        <th>Name</th>
        <!-- <th>Created</th> -->
        <th></th>
      </tr>
      <tr v-for="cellar in cellars" :key="cellar.id" class="cream table-tr">
        <td>{{ cellar.name }}</td>
        <!-- <td class="table-td">{{ formatCreatedAt(cellar.created_at) }}</td> -->
        <td class="table-td">
          <Link class="button sml" :href="route('cellar.show', cellar.id)">Detail</Link>
        </td>
      </tr>
    </table>
    <p v-else class="cream">There is no information available.</p>
  </main>
</template>
  
<script>
import { Head } from '@inertiajs/inertia-vue3';
import { Link } from '@inertiajs/inertia-vue3';
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
  name: 'CellarsView',
  props: {
    cellars: Array,
  },
  components: {
    Head,
    Link
  },
  layout: MainLayout,
  methods: {
    formatCreatedAt(date) {
      const formattedDate = new Date(date).toLocaleDateString();
      return formattedDate;
    }
  }
}
</script>
  //keep
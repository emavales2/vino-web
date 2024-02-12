<!-- Layout pour l'app quand connecter -->
<template>
  <main>
    <header>
      <Link href="/dashboard">Home</Link>
      <Link href="/about">About</Link>
      <Link href="/contact">Contact</Link>
      </header>
    <SearchBar/>
    <article>
    <slot/>
    </article>
  </main>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import SearchBar from '@/Components/SearchBar.vue';

export default {
  components: {
    Link, 
    SearchBar
  }
}
</script>
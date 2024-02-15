<template>
  <DialogWindow 
    v-show="showDialog" 
    :message="message"
  />

  <ModalTest 
    v-show="showSearch"
    :toggleOff="closeModal"
  >
    <SearchBar 
      :toggleSearch="closeModal"
    />
  </ModalTest>

  <header class="top_nav_header">        
    <nav class="top_nav">
    <figure>
        <img src="@/../assets/logos/VINO_lt.svg" alt="">
    </figure>
    <span>
        <span>
            <label for="search-toggle">
                <SearchIcon 
                  :toggleSearch="openSearch"
                />
            </label>
        </span>      
          <Link :href="route('profile.show', user.id)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><circle class="cls-1" cx="12.5" cy="5.05" r="5.05"/><path d="m12.5,11.88C5.9,11.88.41,16.76,0,23c-.03.52.15,1.03.5,1.4.35.38.85.59,1.37.59h21.25c.52,0,1.01-.21,1.37-.59.35-.38.54-.89.5-1.4-.41-6.24-5.9-11.13-12.5-11.13Z"/></svg>
          </Link>                
    </span>
    </nav>        
  </header>
    
  <slot/>

  <footer>
    <nav class="bottom_nav">
        <Link href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="m24.45,11.16L13.83.55c-.73-.73-1.92-.73-2.66,0L.55,11.16c-.73.73-.73,1.92,0,2.65.37.37.85.55,1.33.55s.96-.18,1.33-.55l.53-.53v9.85c0,1.04.84,1.88,1.88,1.88h3.13v-8.75c0-.35.28-.63.63-.63h6.26c.35,0,.63.28.63.63v8.75h3.13c1.04,0,1.88-.84,1.88-1.88v-9.85l.53.53c.37.37.85.55,1.33.55s.96-.18,1.33-.55c.73-.73.73-1.92,0-2.65Z"/></svg>
        </Link>

        <Link href="/cellars">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="m23.12,25H1.88c-1.04,0-1.88-.84-1.88-1.88V1.88C0,.84.84,0,1.88,0h21.25c1.04,0,1.88.84,1.88,1.88v21.25c0,1.04-.84,1.88-1.88,1.88Zm-19.38-3.75h17.5V3.75H3.75v17.5Z"/><circle class="cls-1" cx="7.79" cy="7.79" r="2.5"/><circle class="cls-1" cx="7.79" cy="17.21" r="2.5"/><circle class="cls-1" cx="12.5" cy="12.5" r="2.5"/><circle class="cls-1" cx="17.21" cy="7.79" r="2.5"/><circle class="cls-1" cx="17.21" cy="17.21" r="2.5"/></svg>
        </Link>
        
        <Link href="/wine-collection">
            <svg id="Layer_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25.23"><path d="m16.25,10.57h.01c-1.83-1.7-2.33-6.8-2.33-6.8v-1.83c.2-.03.36-.2.36-.41V.42c0-.23-.19-.42-.42-.42h-2.73c-.23,0-.42.19-.42.42v1.11c0,.21.16.38.36.41v1.83s-.52,5.1-2.35,6.79h.02c-.37.31-.62.74-.62,1.24v11.84c0,.88.71,1.59,1.59,1.59h5.58c.88,0,1.59-.71,1.59-1.59v-11.84c0-.51-.25-.94-.63-1.23Z"/><path class="cls-1" d="m24.37,10.57h.01c-1.83-1.7-2.33-6.8-2.33-6.8v-1.83c.2-.03.36-.2.36-.41V.42C22.41.19,22.22,0,21.99,0h-2.73c-.23,0-.42.19-.42.42v1.11c0,.21.16.38.36.41v1.83s-.36,3.43-1.49,5.59c.82.98.98,1.7.98,1.7.05.24.08.49.08.74v11.84c0,.57-.15,1.11-.4,1.59h5.06c.88,0,1.59-.71,1.59-1.59v-11.84c0-.51-.25-.94-.63-1.23Z"/><path class="cls-1" d="m6.24,23.64v-11.84c0-.23.02-.46.07-.69,0,0,.29-.87.96-1.77h0c-1.12-2.17-1.47-5.57-1.47-5.57v-1.83c.2-.03.36-.2.36-.41V.42C6.17.19,5.98,0,5.75,0h-2.73C2.78,0,2.59.19,2.59.42v1.11c0,.21.16.38.36.41v1.83s-.52,5.1-2.35,6.79h.02c-.37.31-.62.74-.62,1.24v11.84c0,.88.71,1.59,1.59,1.59h5.06c-.25-.48-.4-1.01-.4-1.59Z"/></svg>
        </Link>

        <Link href="/buy-list">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.88 21.53"><path d="m23.12,0h-5.91C16.23,0,15.44.79,15.44,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77S24.09,0,23.12,0Z"/><path d="m23.12,9.23h-5.91c-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77Z"/><path d="m23.12,21.53H1.77c-.98,0-1.77-.79-1.77-1.77s.79-1.77,1.77-1.77h21.35c.98,0,1.77.79,1.77,1.77s-.79,1.77-1.77,1.77Z"/><path d="m11.42,0H1.28C.57,0,0,.57,0,1.28v10.14C0,12.13.57,12.7,1.28,12.7h10.14c.71,0,1.28-.57,1.28-1.28V1.28c0-.71-.57-1.28-1.28-1.28Zm-.87,4.67l-3.61,5.04c-.28.39-.72.6-1.17.6-.29,0-.58-.09-.83-.27l-2.74-1.96c-.64-.46-.79-1.35-.33-2,.46-.64,1.35-.79,2-.33l1.58,1.13,2.77-3.87c.46-.64,1.36-.79,2-.33s.79,1.36.33,2Z"/></svg>
        </Link>

        <!-- <Link href="/notes">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path class="cls-1" d="m24.13,4.07l-3.2-3.2c-1.16-1.16-3.05-1.16-4.21,0L1.8,15.79s-.06.06-.09.1h0s.04-.05.04-.05c-.2.16-.4.42-.48.66l-.31,1.69h0S.02,23.43.02,23.43c-.08.43.06.87.37,1.18h.01c.31.32.76.46,1.2.37l4.84-.98,2.09-.42c.27-.06.5-.18.68-.37l14.92-14.92c1.16-1.16,1.16-3.05,0-4.21Zm-9.31,2.92l3.18,3.18-8.33,8.33-2.41-.72-.65-2.55L14.82,6.99Zm7.19-.83l-1.89,1.89-3.18-3.18,1.87-1.87,3.2,3.17ZM3.4,21.54l.5-2.8.02-.14.16-.85.05-.05.42,1.65c.07.27.21.5.39.69.17.17.39.3.63.38l1.39.42-1.14.23-2.44.49Z"/></svg>
        </Link> -->
    </nav>      
  </footer>
</template>

<script>
import SearchIcon from '@/Components/ButtonsIcons/SearchIcon.vue'
import { Link } from '@inertiajs/inertia-vue3'
import SearchBar from '@/Components/SearchBar.vue'
import DialogWindow from '@/Components/DialogWindow.vue'
import ModalTest from '@/Components/ModalTest.vue'

export default {
  data () {
    return {
      showDialog: false,
      showSearch: false,
      message: '',
      user: this.$attrs.auth.user
    }
  },
  components: {
    DialogWindow,
    Link,
    SearchBar,
    SearchIcon,
    ModalTest
},
  methods: {
    openDialog (message) {
      this.message = message
      this.showDialog = true
      setTimeout(() => { this.showDialog = false }, 3000)
    },
    openSearch () {
      this.showSearch = true;
    },
    closeModal () {
      this.showSearch = false
    }
  }
}
</script>


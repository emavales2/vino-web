<template>
  <DialogWindow 
    v-show="showDialog" 
    :message="message"
  />

  <Modal
    v-show="showSearch"
    :toggleOff="closeModal"
  >
    <SearchBar v-if="showSearch"
      :searchAction="closeModal"
    />
  </Modal>

    <section class="background_blobs">
        <figure class="fig_bg">
            <img src="@/../assets/img/blob_top.svg" class="coral_blob_bg" alt="">    
        </figure>
    </section> 

  <header class="top_nav_header">        
    <nav class="top_nav">
    <figure>
        <img src="@/../assets/logos/VINO_lt.svg" alt="VNO logo">
    </figure>
    <span>
          <span for="search-toggle">
              <SearchIcon 
                :searchAction="openSearch"
              />
          </span>
          <Link aria-label="profile d'utilisateur" :href="route('profile.show', user.id)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><circle class="cls-1" cx="12.5" cy="5.05" r="5.05"/><path d="m12.5,11.88C5.9,11.88.41,16.76,0,23c-.03.52.15,1.03.5,1.4.35.38.85.59,1.37.59h21.25c.52,0,1.01-.21,1.37-.59.35-.38.54-.89.5-1.4-.41-6.24-5.9-11.13-12.5-11.13Z"/></svg>
          </Link>
          <LanguageSelector class="lang"/>                
    </span>
    </nav>        
  </header>
    
  <div class="pad_vert_general">
    <slot/>
  </div>

  <footer>
    <nav class="bottom_nav">
        <figure>
            <Link href="/dashboard" 
              :class="this.page == 'DashboardView' ? 'here' : ''"
              aria-label="Dashboard"
            >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path d="m24.45,11.16L13.83.55c-.73-.73-1.92-.73-2.66,0L.55,11.16c-.73.73-.73,1.92,0,2.65.37.37.85.55,1.33.55s.96-.18,1.33-.55l.53-.53v9.85c0,1.04.84,1.88,1.88,1.88h3.13v-8.75c0-.35.28-.63.63-.63h6.26c.35,0,.63.28.63.63v8.75h3.13c1.04,0,1.88-.84,1.88-1.88v-9.85l.53.53c.37.37.85.55,1.33.55s.96-.18,1.33-.55c.73-.73.73-1.92,0-2.65Z"/></svg>
            </Link>
        </figure>

        <figure>
            <Link href="/cellars"
              :class="this.page == 'Cellar' ? 'here' : ''"
              aria-label="Cellars"
            >
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path class="cls-1" d="m23.13,0H1.88C.84,0,0,.84,0,1.88v21.25c0,1.03.84,1.87,1.88,1.87h21.25c1.03,0,1.87-.84,1.87-1.87V1.88c0-1.04-.84-1.88-1.87-1.88Zm-1.13,22H3V3h19v19Z"/><circle class="cls-1" cx="12.42" cy="6.25" r="1.94"/><circle class="cls-1" cx="5.95" cy="6.25" r="1.94"/><circle class="cls-1" cx="18.9" cy="6.25" r="1.94"/><path class="cls-1" d="m19.99,9.46c-.07,0-.14,0-.2.02-.05,0-.18.05-.18.05,0,0-.03,0-.07.02-.9.21-1.92-.01-2.6-.69-.02-.03-.04-.06-.07-.09-.21-.44-.65-.75-1.17-.75s-.97.31-1.17.75h-.01s-.04.06-.07.09c-.52.52-1.23.77-1.94.77s-1.42-.26-1.94-.77c-.03-.03-.04-.06-.07-.09h-.01c-.2-.44-.64-.75-1.17-.75s-.96.31-1.17.75c-.03.03-.05.06-.07.09-.68.67-1.7.9-2.6.69-.04-.01-.07-.02-.07-.02,0,0-.13-.04-.18-.05-.06-.01-.13-.02-.2-.02-.56,0-1.02.45-1.02,1.02,0,.42.25.77.61.93.01,0,.16.06.23.07.42.13.84.18,1.3.18,1.19,0,2.31-.45,3.18-1.25.88.8,2,1.25,3.19,1.25s2.31-.45,3.19-1.25c.87.8,1.99,1.25,3.18,1.25.46,0,.88-.05,1.3-.18.07,0,.22-.07.23-.07.36-.16.61-.51.61-.93,0-.57-.46-1.02-1.02-1.02Z"/><circle class="cls-1" cx="12.42" cy="15.27" r="1.94"/><circle class="cls-1" cx="5.95" cy="15.27" r="1.94"/><circle class="cls-1" cx="18.9" cy="15.27" r="1.94"/><path class="cls-1" d="m19.99,18.49c-.07,0-.14,0-.2.02-.05,0-.18.05-.18.05,0,0-.03,0-.07.02-.9.21-1.92-.01-2.6-.69-.02-.03-.04-.06-.07-.09-.21-.44-.65-.75-1.17-.75s-.97.31-1.17.75h-.01s-.04.06-.07.09c-.52.52-1.23.77-1.94.77s-1.42-.26-1.94-.77c-.03-.03-.04-.06-.07-.09h-.01c-.2-.44-.64-.75-1.17-.75s-.96.31-1.17.75c-.03.03-.05.06-.07.09-.68.67-1.7.9-2.6.69-.04-.01-.07-.02-.07-.02,0,0-.13-.04-.18-.05-.06-.01-.13-.02-.2-.02-.56,0-1.02.45-1.02,1.02,0,.42.25.77.61.93.01,0,.16.06.23.07.42.13.84.18,1.3.18,1.19,0,2.31-.45,3.18-1.25.88.8,2,1.25,3.19,1.25s2.31-.45,3.19-1.25c.87.8,1.99,1.25,3.18,1.25.46,0,.88-.05,1.3-.18.07,0,.22-.07.23-.07.36-.16.61-.51.61-.93,0-.57-.46-1.02-1.02-1.02Z"/></svg>
            </Link>
        </figure>
        
        <figure>
            <Link :href="route('collection')"
             :class="this.page == 'CollectionView' ? 'here' : ''"
             aria-label="Collection"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><path class="cls-1" d="m16.71,12.62h0s0-.02,0-.02c-.08-.39-.19-.72-.3-.89-.66-1.66-2.04-4.38-2.06-4.41-.24-1.07-.34-1.91-.34-1.91V.45c0-.25-.22-.45-.49-.45h-1.87c-.27,0-.49.2-.49.45v4.93s-.09.83-.34,1.91c-.02.04-1.4,2.75-2.06,4.41-.12.17-.22.5-.3.89,0,0,0,.02,0,.02h0c-.15.7-.24,1.53-.24,1.8v9.13c0,.8.71,1.45,1.58,1.45h5.57c.88,0,1.58-.65,1.58-1.45v-9.13c0-.27-.09-1.11-.24-1.8Z"/><path class="cls-1" d="m6.21,23.55v-9.13c0-.37.09-1.19.22-1.91v-.07s.07-.25.07-.25c.12-.52.25-.92.43-1.24.14-.34.3-.71.47-1.09-.61-1.31-1.24-2.54-1.25-2.57-.24-1.07-.34-1.91-.34-1.91V.45c0-.25-.22-.45-.49-.45h-1.87c-.27,0-.49.2-.49.45v4.93s-.09.83-.34,1.91c-.02.04-1.4,2.75-2.06,4.41-.12.17-.22.5-.3.89,0,0,0,.02,0,.02h0c-.15.7-.24,1.53-.24,1.8v9.13c0,.8.71,1.45,1.58,1.45h5.01c-.24-.44-.39-.93-.39-1.45Z"/><path class="cls-1" d="m24.76,12.62h0s0-.02,0-.02c-.08-.39-.19-.72-.3-.89-.66-1.66-2.04-4.38-2.06-4.41-.24-1.07-.34-1.91-.34-1.91V.45c0-.25-.22-.45-.49-.45h-1.87c-.27,0-.49.2-.49.45v4.93s-.09.83-.34,1.91c-.01.02-.59,1.16-1.18,2.41.2.43.38.86.54,1.25.18.32.31.72.43,1.25l.02.09c.16.77.27,1.73.27,2.14v9.13c0,.52-.15,1.01-.39,1.45h4.86c.88,0,1.58-.65,1.58-1.45v-9.13c0-.27-.09-1.11-.24-1.8Z"/></svg>
            </Link>
        </figure>

        <figure>
            <Link href="/buy-list"
              :class="this.page == 'BuyList' ? 'here' : ''"
              aria-label="Buy List"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.88 21.53"><path d="m23.12,0h-5.91C16.23,0,15.44.79,15.44,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77S24.09,0,23.12,0Z"/><path d="m23.12,9.23h-5.91c-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77Z"/><path d="m23.12,21.53H1.77c-.98,0-1.77-.79-1.77-1.77s.79-1.77,1.77-1.77h21.35c.98,0,1.77.79,1.77,1.77s-.79,1.77-1.77,1.77Z"/><path d="m11.42,0H1.28C.57,0,0,.57,0,1.28v10.14C0,12.13.57,12.7,1.28,12.7h10.14c.71,0,1.28-.57,1.28-1.28V1.28c0-.71-.57-1.28-1.28-1.28Zm-.87,4.67l-3.61,5.04c-.28.39-.72.6-1.17.6-.29,0-.58-.09-.83-.27l-2.74-1.96c-.64-.46-.79-1.35-.33-2,.46-.64,1.35-.79,2-.33l1.58,1.13,2.77-3.87c.46-.64,1.36-.79,2-.33s.79,1.36.33,2Z"/></svg>
            </Link>
        </figure>
    </nav>      
  </footer>
</template>

<script>
import SearchIcon from '@/Components/ButtonsIcons/SearchIcon.vue'
import { Link } from '@inertiajs/inertia-vue3'
import SearchBar from '@/Components/SearchBar.vue'
import DialogWindow from '@/Components/DialogWindow.vue'
import LanguageSelector from '@/Components/LanguageSelector.vue'
import Modal from '@/Components/Modal.vue'
import ConfirmModal from '@/Components/ConfirmModal.vue'
import { computed } from 'vue'
export default {
  data () {
    return {
      page: computed(() => {
        return this.$page.component.split('/')[0] 
      }),
      showDialog: false,
      showModal: false,
      showSearch: false,
      showConfirm: false,
      message: '',
      user: this.$attrs.user || this.$attrs.auth.user
    }
  },
  components: {
    DialogWindow,
    LanguageSelector,
    Link,
    SearchBar,
    SearchIcon,
    Modal,
    ConfirmModal
},
  methods: {
    openDialog (message) {
      this.message = message
      this.showDialog = true
      setTimeout(() => { this.showDialog = false }, 3000)
    },
    openSearch () {
      this.showSearch = true
    },
    closeModal () {
      this.showSearch = false
    }
  }
}
</script>


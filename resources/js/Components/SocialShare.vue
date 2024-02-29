<template>
  <button class="button btn-sml btn-burgundy btn-logo" @click="shareTo">
    <FacebookLogo v-if="network === 'facebook'"/>
    <TwitterLogo v-if="network === 'twitter'"/>
    {{ __('actions.share') }}
  </button>
</template>
<script>
import FacebookLogo from '@/Components/ButtonsIcons/FacebookLogo.vue'
import TwitterLogo from '@/Components/ButtonsIcons/TwitterLogo.vue'
export default {
  components:{
    FacebookLogo,
    TwitterLogo
  },
  data () {
    return {
      facebook: `https://www.facebook.com/sharer/sharer.php?u=${this.url}`,
      twitter: `https://twitter.com/intent/post?url=${this.url}`,
    }
  },
  methods: {
    shareTo () {
      if(this.network === 'facebook') {
        window.open(this.facebook, 'popup', "width=600, height=600")
      }
      if(this.network === 'twitter') {
        window.open(this.twitter, 'popup', "width=600, height=600")
      }
    }
  },
  props: ['url', 'network']
}
</script>
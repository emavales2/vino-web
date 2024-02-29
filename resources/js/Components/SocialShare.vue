<template>
  <button class="button btn-sml btn-coral" @click="shareTo">{{ __('actions.share') }}</button>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3'
export default {
  components:{Head},
  data () {
    return {
      facebook: `https://www.facebook.com/sharer/sharer.php?u=${this.url}`
    }
  },
  methods: {
    shareTo () {
      if(this.network === 'facebook') {
        window.open(this.facebook, 'popup', "width=600, height=400")
      }
    }
  },
  props: ['url', 'network']
}
</script>
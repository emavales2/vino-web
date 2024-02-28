<template>
  <button class="button btn-sml" @click="shareTo">Share</button>
</template>
<script>
export default {
  data () {
    return {
      facebook: `https://www.facebook.com/sharer/sharer.php?u=${this.url}&t=${this.title}&description=${this.description}&quote=${this.quote}&hashtag=${this.hashtag}`
    }
  },
  methods: {
    shareTo () {
      if(this.network === 'facebook') {
        window.open(this.facebook, 'popup', "width=600, height=400")
      }
    }
  },
  props: ['url','title','description', 'network', 'quote', 'hashtag', 'network']
}
</script>
https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fthomasira.com%2Fwine%2Fpublic%2F23235%2F1&title=vino&description=&quote=Look%20at%20that%20hot%20wine!&hashtag=%23vino
https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fwine%2Fpublic%2F30546%2F1&title=Vino!&description=Lets%20share%20our%20love%20for%20wine&quote=Hi%2C%20share%20this%20amazing%20bottle%20with%20me&hashtag=vino
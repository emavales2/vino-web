<template>
  <Head>
    <meta property="og:site_name" content="thomasira.com">
    <meta property="og:title" content="Vino!">
  </Head>
  <button class="button btn-sml" @click="shareTo">Share</button>
</template>
<script>
import { Head } from '@inertiajs/inertia-vue3'
export default {
  components:{Head},
  data () {
    return {
      facebook: `https://www.facebook.com/sharer/sharer.php?u=${this.url}&t=${this.title}&description=${this.description}&quote=${this.quote}&hashtag=${this.hashtag}`
    }
  },
  methods: {
    shareTo () {
      console.log(this.title)
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

https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.leparisien.fr%2Fpolitique%2Fun-pas-decisif-vers-linscription-de-livg-dans-la-constitution-dans-les-coulisses-du-oui-du-senat-28-02-2024-VIEKJU2DMJEYVEF5CU6NUHMUZ4.php%3Futm_campaign%3Dfacebook_partage%26utm_medium%3Dsocial&t=%C2%AB%C2%A0Un%20pas%20d%C3%A9cisif%C2%A0%C2%BB%20vers%20l%E2%80%99inscription%20de%20l%E2%80%99IVG%20dans%20la%20Constitution%C2%A0%3A%20les%20coulisses%20du%20%C2%AB%C2%A0oui%C2%A0%C2%BB%20du%20S%C3%A9nat
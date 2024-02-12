<template>
  <button @click="goBack" class="goBackButton">
    <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.20577 10.547L0.545519 5.547L9.20577 0.546997V3.81495L17 3.81495V7.27905L9.20577 7.27905V10.547Z" fill="#EDE7D1"/>
    </svg>
    <p>go back</p>
  </button>
</template>

<script>
export default {
  name: 'GoBackButton',
  methods: {
    goBack () {
      window.history.back()
    }
  }
}
</script>

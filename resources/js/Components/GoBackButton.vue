<template>
  <button @click="goBack">back</button>
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

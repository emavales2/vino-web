<template>
  <div>
    <img :src="wine.photo" :alt="wine.name">
    <section>
      <h1>{{ wine.name }}</h1>
      <div>
        <p v-if="wine.user_id">custom wine</p>
        <p v-else>code saq: {{ wine.code_saq }}</p>
        <div>
          <h2>Information</h2>
          <ul>
            <li>type: {{ wine.type ? wine.type : 'n/a' }}</li>
            <li>country: {{ wine.country ? wine.country : 'n/a' }}</li>
            <li>size: {{ wine.size ? wine.size : 'n/a' }}</li>
            <li>price: {{ wine.price ? wine.price + ' $' : 'n/a' }}</li>
          </ul>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default{
  name:'Wine.ShowView',
  components: {
  },
  props: ['wine'],
}
</script>


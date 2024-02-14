<template>

  //exemple classique
  <Composant
    :bind1="bind1"
    :...
    :...
  />

  // exemple sloté
  <Composant>
    <slot/>
  </Composant>

  // exemple composant transition
  <Transition name:'balbal'>
    <Composant/>
  </Transition>


</template>

<script>
import '' from ...
import '' from ...

export default {
    name: 'pls give a name',
    computed () {

    },
    data () {

    },
    ...
    'le reste en ordre alpha'
}
</script>

// destroy
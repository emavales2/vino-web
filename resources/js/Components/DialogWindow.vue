<template>
  <Transition 
    enter-active-class="ease-out duration-300"
    enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    enter-to-class="opacity-100 translate-y-0 sm:scale-100"
    leave-active-class="ease-in duration-200"
    leave-from-class="opacity-100 translate-y-0 sm:scale-100"
    leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
    <div class="bg-stone-900 text-stone-200 absolute top-0 p-4">
      <h2>{{ message }}</h2>
    </div>
  </Transition>
</template>

<script>
export default{
  name:'dialog-window',
  props: ['message']
}
</script>

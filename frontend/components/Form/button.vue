<template>
  <button class="flex capitalize but_fr bg-success" v-bind="$attrs" @click="$emit('click', $event)">
    <svg
    v-if="loading"
    class="animate-spin mr-2 h-5 w-5 text-white"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      <slot />
  </button>
</template>
<script>
export default {
  inheritAttrs: false,

  // props: ["click"]
  props: {
    loading: {
      type: Boolean,
      default: false,
    }
  }

}
</script>

<style scoped lang="scss">
// .but_fr{
//   @apply text-sm dark transition duration-300 text-white px-2 pt-1 pb-0 rounded;
//   &:hover {
//     @apply bg-opacity-75;
//   }
//   &[disabled] {
//     background-color: gray;
//     cursor: not-allowed;
//   }
// }
.but_fr{
  background:green;
  padding: 6px 15px;
  color: yellow;
}
</style>

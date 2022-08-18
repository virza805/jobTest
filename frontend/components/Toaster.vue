<template>
  <div
  class="relative p-2 text-center text-yellow-100"
  :class="{
    ' bg-primaryLink' : type == 'error',
    ' bg-primaryGreen' : type == 'success',
    ' bg-yellow-600' : type == 'warning',
    ' bg-blue-500' : type == 'info',
  }"
v-if="visible"
  >
   <!-- v-if="visible" -->
    <p>{{ text }}</p>
    <button
    @click="$store.commit('toaster/close')"
    class="absolute text-2xl top-1 right-2"

    >&times;</button>
  </div>
</template>

<script>
import {mapState} from "vuex";
export default {
  computed: {
    ...mapState("toaster", ["visible", "text", "type"]),
  },

};
</script>

<style>

</style>

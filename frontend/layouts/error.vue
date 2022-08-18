<template>
  <div class="text-center my-12">
    <Toaster />

    <pre>
      {{ error }}
    </pre>

    <div>
      <img class="mx-auto" src="~/assets/img/virzaOk.gif" alt="" />
    </div>
    <div>
      <h2 class="text-6xl text-red-700 font-bold ">{{ error.statusCode }}</h2>
      <p class="text-lg text-red-500 my-4 ">{{ error.message }}</p>
      <h3 class="text-2xl ">
        {{ error.path }}
      </h3>
    </div>
  </div>
</template>

<script>
export default {
  // layout: 'backend',
  props:["error"]

}
</script>

<style>

</style>

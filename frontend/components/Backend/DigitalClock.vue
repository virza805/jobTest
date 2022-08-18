<template >
  <div class="clock">
    <div id="clock">00:00:00</div>
  </div>
</template>
<script>
export default {
  head: {
    script: [
      {
        type: 'text/javascript',
        src: "/js/digital_clock.js",
        body: true,
        async: true,
        crossorigin: "anonymous"
      },
    ],
  }
  // mounted() {
  //   const script = document.createElement("script");
  //   script.type = "text/javascript";
  //   script.src = "~/assets/js/digital_clock.js";
  //   document.body.appendChild(script);
  // }
}
</script>

<style scoped>

</style>

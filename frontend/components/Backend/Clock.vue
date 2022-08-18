<template >
  <div class="analock_clock" style="display: flex; justify-content: center;">
                <canvas id="canvas" width="130" height="130" style="text-align:center"></canvas>
            </div>
</template>
<script>
export default {
  head: {
    script: [
      {
        type: 'text/javascript',
        src: "/js/clock.js",
        body: true,
        async: true,
        crossorigin: "anonymous"
      },
    ],
  }

}
</script>

<style scoped>

</style>

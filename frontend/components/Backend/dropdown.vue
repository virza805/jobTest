<template>
  <div class="dropdown"  v-bind="$attrs">
    <div class="drop_btn drop_con">{{ title }}</div>
    <div class="dropdown-con">
      <slot />
    </div>
  </div>
</template>
<script>
  export default {
    inheritAttrs: false,
    props: {
      title:{
        type: String,
        require: true,
      },
    },
    head: {
      script: [{
        type: 'text/javascript',
        src: "/js/dropdown.js",
        body: true,
        async: true,
        crossorigin: "anonymous"
      }, ],
    }

  }

</script>

<style scoped>
.drop_btn.drop_con + .dropdown-con {
    display: none;
}
</style>

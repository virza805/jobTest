<template>
  <div>
    <NuxtLogo />
    <Editor />
  </div>
</template>

<script>
import NuxtLogo from '~/components/NuxtLogo.vue';
import Editor from '~/components/Editor.vue';
export default {
    components: { NuxtLogo, Editor }
}
</script>

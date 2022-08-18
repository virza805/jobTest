<template>
  <div>
    <label for="email" class="text-sm">{{ label }}</label>
    <input
      :class="{
        'border-red-300' : hasError,
        'border-gray-300' : !hasError,
      }"
      class="appearance-none rounded-lg relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm"
      id="email"
      @change="$emit('input', $event.target.value)"
      :value="value"
      :type="type"
      v-bind="$attrs"
    />

    <p
    :class="{
      'text-red-500' : hasError,
      'text-gray-500' : !hasError,
    }"
    class="text-red-500 text-sm"
    >{{ helperText }}</p>
  </div>

</template>

<script>
  export default {
    inheritAttrs: false,
    props: {
      label:{
        type: String,
        require: true,
      },

      helperText:{
        type: String,
        require: false,
      },

      hasError: {
        type: Boolean,
        require: false,
      },
      value: {
        type: String,
        require: false,
      },
      type: {
        type: String,
        default: 'text',
      },
    }

  }

</script>
<style>

</style>

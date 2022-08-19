<template >
  <div class="flex justify-content-around ">
    <div class="left">
      <ul class="flex justify-content-start">
            <li>
              <nuxt-link class="p-4" to="/">Home</nuxt-link>
            </li>
            <li>
              <nuxt-link class="p-4" to="/category">Categories</nuxt-link>
            </li>
            <li>
              <nuxt-link class="p-4" to="/category">Product</nuxt-link>
            </li>
          </ul>
    </div>
    <h2>Frontend Header</h2>
    <div class="right flex">
      <nuxt-link to="/auth/register"
            class=" hidden bs-icon-box rounded-full hover:bg-gray-200  md:flex items-center justify-center"><img
              src="~/assets/img/user.png" alt=""></nuxt-link>
          <NuxtLink to="/auth/login"
            class="bs-icon-box rounded-full hover:bg-gray-200 flex items-center justify-center"><img
              src="~/assets/img/log-in.svg" alt=""></NuxtLink>
    </div>
  </div>
</template>
<script>
export default {

}
</script>

<style scoped>

</style>

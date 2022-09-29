<template>
  <div class="text-center my-12">
    <h2 class="text-4xl">Wellcome {{ $auth.user.name }} </h2>
    <p>You are a
      <UserRole />
    </p>

    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 mb-20 ">
      <div class="max-w-md w-full space-y-8 mx-auto">


        <div>
          <!-- <BackendDropdown title="Tanvir Md. Al Amin">
            <nuxt-link class="" to="/backend/setting">Slot Test 1 </nuxt-link>
            <nuxt-link class="" to="/backend/setting">Slot Test 2 </nuxt-link>
            <nuxt-link class="" to="/backend/setting">Slot Test 3</nuxt-link>
          </BackendDropdown> -->
        </div>



        <backend-email-verification-status v-if=" $auth.user.email_verified_at == null" />
        <img src="~/assets/img/verify-email.png" alt="" width="300px" class="mx-auto"
          v-if=" $auth.user.email_verified_at !== null">
      </div>
    </div>

    <div>
      <img class="mx-auto" src="~/assets/img/virzaOk.gif" alt="" />
    </div>
  </div>
</template>

<script>
  import backend from '../../layouts/backend.vue'
  export default {
    components: {
      backend
    },
    middleware: 'auth',
    layout: 'backend',
    head: {
      title: "Dashboard Home",
    },

    mounted() {
      if (this.$route.query.verified) {
        // toast massage show
        this.$store.commit("toaster/fire", {
          text: "Your email address has been verified",
        });
      }
    },

  }

</script>

<style scoped>

</style>

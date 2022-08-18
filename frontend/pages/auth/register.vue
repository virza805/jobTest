<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-50">
    <body class="h-full">
    ```
  -->
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="~/assets/img/virzaOk.gif" alt="Workflow" />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-yellow-600">Account Register Now</h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Or <nuxt-link to="/" class="font-medium text-indigo-600 hover:text-indigo-500">Go to Home Page</nuxt-link>
        </p>
      </div>
      <!-- <pre>
        {{errors}}
      </pre> -->
      <form
      class="mt-8 space-y-6"
      action="#"
      @submit.prevent="handleSubmit"
       method="POST">
        <input type="hidden" name="remember" value="true" />
        <FormInput
          label="Name"
          v-model="form.name"
          :helperText="errorMsg('name')"
          :hasError="hasError('name')"
         />
        <form-input
          type="email"
          label="Email Address"
          v-model="form.email"
          :helperText="errorMsg('email')"
          :hasError="hasError('email')"
       />
      <form-input
        type="password"
        label="Password"
        v-model="form.password"
        :helperText="errorMsg('password')"
        :hasError="hasError('password')"
       />
      <form-input
        type="password"
        label="Confirm Password"
        v-model="form.password_confirmation"
        :helperText="errorMsg('password_confirmation')"
        :hasError="hasError('password_confirmation')"
        class="mb-10 "
       />


        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
          </div>

          <div class="text-sm">
            <nuxt-link to="/auth/login" class="font-medium text-green-600 hover:text-green-800"> Go to login </nuxt-link>
          </div>
        </div>



        <div>
          <form-button :loading="loading">Sign Up</form-button>

        </div>
      </form>
    </div>
  </div>
</template>

<script>
import form from '../mixins/form';
import Input from '../../components/Form/Input.vue';
export default {
    middleware: 'guest',
    layout: "sing_in_up",
    head: {
        title: "Signup",
    },
    components: { Input },
    mixins: [form],

    data() {
      return{
        form:{
          name: "",
          email: "",
          password: "",
          password_confirmation: "",
        },
        errors: {},
        loading: false,
      };
    },

    methods: {
      // From submit same work by then & catch
     async handleSubmit() {
        // api call
        try {
          this.loading = true;
          const res = await this.$axios.$post('/api/user/register', this.form)
          this.loading = false;

          // toast massage show

          this.$store.commit("toaster/fire", {
            text: "Successfully created a new account. please check your email to verify your account.",
          });

          this.$router.push("/");

        } catch (e) {
          // console.log(e.response.data);

          // toast massage show

          this.$store.commit("toaster/fire", {
            text: e.response.data.message,
            type: "error",
          });

          this.errors = e.response.data?.errors || {};
          this.loading = false;

        }

      },

// From submit same work by then & catch

      // handleSubmit() {
      //   // api call
      //   this.$axios
      //   .$post('/api/user/register', this.form)
      //   .then((res) =>{
      //     this.$router.push("/");
      //   })
      //   .catch((e) => {
      //     // console.log(e.response.data);

      //     this.errors = e.response.data?.errors || {};
      //   });
      // },


    }
};
</script>

<style scoped>

</style>

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
        <!-- <img class="mx-auto h-12 w-auto" src="~/assets/img/virzaOk.gif" alt="Workflow" /> -->
        <Tanvir />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-yellow-600">Add Category</h2>

      </div>
      <form
      class="mt-8 space-y-6"
      action="#"
       @submit.prevent="handleSubmit"
      method="POST"
      enctype="multipart/form-data"
      >
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
          <form-input

            label="name"
            v-model="form.name"
            :helperText="errorMsg('name')"
            :hasError="hasError('name')"
            placeholder="name"
          />
          <form-input

            label="0 for show before footer"
            v-model="form.slug"
            :helperText="errorMsg('slug')"
            :hasError="hasError('slug')"
            placeholder="0 or other"
          />

          <form-input
            type="file"
            label="image"
            v-model="form.image"
            :helperText="errorMsg('image')"
            :hasError="hasError('image')"
            placeholder="image"
          />

        </div>


        <div>
          <form-button :loading="loading">+ Add Category</form-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

import form from '../mixins/form';
import Input from '../../components/Form/Input.vue';
export default {
    // middleware: ['auth'],

    middleware: 'auth',
    layout: 'backend',
    head: {
        name: "Add Category",
    },
    components: { Input },
    mixins: [form],

    data() {
      return{
        form:{
          name: "",
          slug: "",
          image: "",
        },
        errors: {},
        loading: false,
      };
    },

    methods: {
      // From slugmit async await
     async handleSubmit() {
        // api call
        try {
          this.loading = true;
          const res = await this.$axios.$post('/api/user/cat/store', this.form)
          this.loading = false;

          // toast massage show

          this.$store.commit("toaster/fire", {
            text: "Successfully created Category.",
          });

          this.$router.push("/backend/showCategory");

        } catch (e) {
          // console.log(e.response.data);

          // toast massage show

          this.$store.commit("toaster/fire", {
            text: e.response.data.err_message,
            type: "error",
          });

          this.errors = e.response.data?.data || {};
          this.loading = false;

        }

      },


    }
};
</script>

<style scoped>

</style>


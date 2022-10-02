<template>
  <div class=" w-96 my-0 mx-auto">

    <form action="">
      <Input
        label="Name"
        v-model="form.name"
        placeholder="name"
      />
      <Input
        type="email"
        label="Email"
        v-model="form.email"
        placeholder="Enter your email"
      />
      <Input
        type="number"
        label="Phone"
        v-model="form.phone"
        placeholder="Enter your number"
      />
      <select
          v-model="form.role"
          name="role"
          class="appearance-none rounded-lg relative block w-full px-3 py-2 border placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm cursor-pointer my-3"

        placeholder="Select role"
          >

            <option value=" ">Select role</option>
            <option value="Admin">Admin</option>
            <option value="Staff">Staff</option>
          </select>

      <Button :loading="loading">+ Add</Button>
    </form>
  </div>
</template>
<script>
import Input from "./Form/Input.vue";
import Button from "./Form/Button.vue";
export default {
    components: { Input, Button },
    data() {
      return {

        form:{
          name: "",
          email: "",
          phone: "",
          time: "",
          role: "",
          done: false
        },
        errors: {},
        loading: false,
      }
    },
}
</script>
<style>

</style>

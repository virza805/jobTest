<template>
  <form class="contextbox" @submit.prevent="handleSubmit">
    <input type="text" placeholder="Name" v-model="staff.name">
    <input type="email" placeholder="Email" v-model="staff.email">
    <input type="number" placeholder="Phone No." v-model="staff.phone">
     
    <div class="controls">
      <div class="colors">
      <span>SelectRole: </span>
        <span 
          v-for="role in roles"
          :key="role"
          :style="{
            border: staff.role == role ? '1px solid green' : ''
          }"
          @click="staff.role = role">{{role}}</span>

      </div>
      <button>Add</button>
    </div>
  </form>
</template>

<script>
import { mapState } from 'vuex';
import { v4 } from 'uuid';
  export default {
    data() {
      return {
        staff: {
          name: "",
          email: "",
          phone: "",
          role: null,
          done: false

        },
      };
    },
    computed: {
      ...mapState("staffs", ["roles"])
    },
    
    methods: {
      handleSubmit() {
        this.staff.id = v4();
        this.staff.created_at = new Date();
        // console.log(this.staff);
        this.$store.commit("staffs/addStaff", this.staff);

        this.staff = {
          name: "",
          email: "",
          phone: "",
          role: null,
          done: false
        };
      },
      
    },
  };
</script>

<style>

</style>
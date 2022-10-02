<template>
  <div 
    class="note" 
    :class="{
      'bg-color': staff.done
      }" 
    @click="toggleDone(staff)">
    <div>
      <h3 class="title">{{ staff.name }} <span class="staff_role">( {{staff.role}} )</span></h3>
      <p class="staff_info">{{ staff.email }} | {{ staff.phone }}</p>
    </div>
    <p class="time">{{ time }}</p>
    <div class="buttons"><button @click="remove" class="delete">X</button></div>
  </div>
</template>

<script>
  import dayjs from "dayjs";
  import Swal from 'sweetalert2'
  export default {

    props: ["staff"],
    computed: {
      time() {
        return dayjs(this.staff.created_at).format('h:m a dddd D MMMM YYYY');
      }
    },
    methods: {
      remove() {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            this.$store.commit("staffs/deleteStaff", this.staff.id);
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      },
      toggleDone(staff) {
        staff.done = !staff.done;
      }
    },

  };
</script>
<style>
  .staff_info, .time{
    font-size: 14px;
  }
  .staff_role{
    font-size: 16px;
    color: #666;
  }
</style>
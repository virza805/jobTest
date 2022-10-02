<template>
  <div class="app">
    <Gif />
    <div class="header">
      <h1 class="app-title">Vuex to Store items</h1>
    </div>
    <!--Editor-->
    <Editor />

    <!--Filter-->
    <Filter />

    <div class="notes">
      <!--staff-->
      <Staff v-for="staff in filteredStaffs" :key="staff.id" :staff="staff" />
    </div>
  </div>
</template>
<script>
  import {
    mapGetters
  } from 'vuex';
  import Gif from './components/Gif.vue';
  import Editor from './components/Editor.vue';
  import Filter from './components/Filter.vue';
  import Staff from './components/Staff.vue';
  export default {
    mounted() {
      this.unsubscribe = this.$store.subscribe((_, state) => {
        localStorage.setItem("staffs:staffs", JSON.stringify(state.staffs.staffs));
      });
    },
    components: {
      Gif,
      Editor,
      Filter,
      Staff
    },
    computed: {
      ...mapGetters("staffs", ["filteredStaffs"]),
    },
  };
</script>
<template>
  <div class="filter">
      <button @click="$store.commit('staffs/filterStaff', '')">All ({{ allCount }})</button>
      <button 
        v-for="role in staffCountByRole"
        :key="role.role" 
        
        @click="$store.commit('staffs/filterStaff', role.role)">
           {{role.role}} ({{ role.staffCount }})
      </button>
      
      
      
      
  </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  computed: {
    ...mapGetters("staffs", ['staffCountByRole', 'allCount'])
  }
};
</script>

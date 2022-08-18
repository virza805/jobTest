<template>
  <div class="backend_layout_fixed">
    <Toaster />
    <div id="backendWrapper" class="left_sidebar_show">
      <nav class="backend_menu">
        <ul>
          <li>
            <span onclick="backendSidebarOnOffFunction()">
              <img class="left_arrow" src="~/assets/img/arrow-left.svg" alt="">
              <img class="right_arrow" src="~/assets/img/arrow-right.svg" alt="">
            </span>
          </li>
          <!-- <li><span onclick="backendSidebarOnOffFunction()" id="togglebutton">Show/hide</span></li> -->
          <li>
            <!-- <nuxt-link class="" to="/backend/profile">My Profile</nuxt-link> -->
          </li>
          <li>
            <nuxt-link class="" to="/backend/setting">Setting</nuxt-link>
          </li>
        </ul>

        <BackendDigitalClock></BackendDigitalClock>

        <ul>
          <li class="fullScreen_on_off" id="fullScreen">
            <button class="active_on" onclick="openFullscreen();"><img src="~/assets/img/maximize-2.svg"
                alt="maximize"></button>
            <button class="active_off" onclick="closeFullscreen();"><img src="~/assets/img/minimize-2.svg"
                alt="minimize"></button>
          </li>
          <!-- <li>
            <button @click="handleLogouts"
              class="bs-icon-box rounded-full hover:bg-gray-200 inline-block flex items-center justify-center">Logout</button>
          </li> -->
          <li>
            <button @click="handleLogout"
              class="bs-icon-box rounded-full hover:bg-gray-200 inline-block flex items-center justify-center"><img class="w-6 "
                src="~/assets/img/logout.png" alt=""></button>
          </li>
          <li>
            <nuxt-link class="backendLogo" to="/"><img src="~/assets/img/virzaOk.gif" alt=""></nuxt-link>
          </li>
        </ul>
      </nav>

      <aside class="main_sidebar">
        <a href="#">
          <div class="profile_inf">
            <img src="~/assets/img/Tanvir Md. Al-Amin.jpg" alt="Admin Img" style="opacity:1; width: 70px;">
            <div class="user_con">
              <h3><span style="font-size:10px ">User role</span>
              <b class="text-green-600 " v-if=" $auth.user.role == 1">superAdmin</b>
              <b class="text-green-400 " v-if=" $auth.user.role == 2">Admin</b>
              <b class="text-yellow-400 " v-if=" $auth.user.role == 3">Manager</b>
              <b class="text-yellow-600 " v-if=" $auth.user.role == 4">Other</b>
              </h3>
              <h5>{{ $auth.user.name }}</h5>
            </div>
          </div>
        </a>

        <BackendLeftSidebarMenu></BackendLeftSidebarMenu>

        <BackendClock></BackendClock>

        <button @click="handleLogout" class="px-6 py-2 mx-4 my-2 text-center text-yellow-100 bg-red-600 hover:bg-red-900">Logout</button>

        <!-- sidebar menu the end -->
      </aside>

      <div class="backend_content_wrapper">

        <Nuxt />

      </div>

      <footer class="main-footer">
        <strong>Copyright <a href="https://vir-za.com">© 2022 Tanvir Md. Al Amin</a>.</strong> All rights reserved.

      </footer>


    </div>
  </div>
</template>
<script>
import form from '../pages/mixins/form';
import Toaster from '../components/Toaster.vue';
  export default {
    middleware: 'auth',
    head: {
        title: "Dashboard",
        script: [{
                type: "text/javascript",
                src: "/js/backend_left_sidebar_menu.js",
                body: true,
                async: true,
                crossorigin: "anonymous"
            }, {
                type: "text/javascript",
                src: "/js/backend_layout_full_hight.js",
                body: true,
                async: true,
                crossorigin: "anonymous"
            }, {
                type: "text/javascript",
                src: "/js/backend_left_sidebar_on_off.js",
                body: true,
                async: true,
                crossorigin: "anonymous"
            },
        ],
    },
    data() {
      return {
        loading: false,
      }
    },
    mixins: [form],
    components: { Toaster },
    methods: {
      handleLogout(){
        this.$auth.logout();
      },
    // async handleLogouts() {

    //     try {
    //       this.loading = true;
    //       await this.$axios.get("api/user/logout");
    //       // this.$router.push("/auth/login");
    //       this.loading = false;

    //       // toast massage show
    //       this.$store.commit("toaster/fire", {
    //         text: "Successfully logout.",
    //         type: "error",
    //       });

    //     } catch (e) {
    //       // toast massage show
    //       this.$store.commit("toaster/fire", {
    //         text: e.response.data.message,
    //         type: "error",
    //       });

    //       this.errors = e.response.data?.errors || {};
    //       this.loading = false;
    //     }

    //   }
    },

}
</script>
<style scoped>

</style>

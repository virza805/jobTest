<template>
  <div class="container py-6">
    <div class="flex">
      <div class="w-full absolute md:bg-transparent bg-green-100 md:relative md:w-1/4 pr-6">
        <!-- <Sidebar /> -->
      </div>
      <div class="w-full md:w-3/4">
        <div class="w-full p-3 mb-10 border-2 border-dashed shadow-sm rounded-2xl border-green-100 ">
          <img class="w-full mx-auto rounded-2xl" src="~/assets/img/cover.png" alt="Thanks" />
        </div>

        <div class="md:flex-row flex-col justify-between items-center mb-8">
          <h3 class="md:text-left text-center text-3xl mb-2">You select Category id = {{ this.categoryId }} </h3>
          <!-- <div class="min-w-max flex items-center">
            <div class="text-sm mr-6"><b>20</b> Products Found</div>
            <select name="" id="">
              <option value="">Default sorting</option>
              <option value="">Sort by price</option>
              <option value="">Sort by discount</option>
            </select>
          </div> -->
        </div>

        <div class="flex flex-wrap ">
          <div v-if="load" class="text-xl my-3 text-red-400 font-medium text-center "> Loading ... .. .</div>

          <div v-for="product in cat_product_list.data" :key="product.id" class="w-1/2 md:w-1/3 px-4 mb-10">

            <div class="single-bs-product">
              <div class="h-80  relative mb-6">
                <div class="h-full bg-gray-50 flex justify-center items-center p-4">
                  <img class="mx-auto w-auto" src="~/assets/img/carousel-img-1.png" alt="Workflow" />
                </div>

                <div class="product-img-hover absolute h-full w-full top-0 left-0 flex justify-center items-center">
                  <div class="bg-black absolute h-full w-full opacity-60"></div>
                  <nuxt-link :to="`/productDetails/?id=${product.id}`"
                    class=" absolute left-0 bottom-0 bg-gray-200 p-2 w-full flex items-center justify-center">Details
                    &raquo;
                  </nuxt-link>

                </div>
              </div>

              <h4 class="text-xl mb-3">{{ product.name }}</h4>
              <p><span class="font-medium bs-dark-orange-color">$ {{ product.price }} </span> <del
                  class="text-gray-400">${{ product.sell_price }}</del></p>

            </div>
          </div>
        </div>

        <div class="text-center mb-10">
          <pagination v-model="page" :records="total" :per-page="per_page" @paginate="getCatProductData"></pagination>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
  // import Sidebar from "../components/Sidebar";
  import SingleProductBox from "../components/SingleProductBox";
  export default {
    head: {
      title: "Show Category",
    },
    name: "category",
    components: {
      SingleProductBox

    },
    data() {
      return {
        cat_product_list: {},
        page: 1,
        data: [],
        per_page: 0,
        total: 0,
        categoryId: "",
      }
    },

    created: function () {
      // this.getData();
      this.getCatProductData();
      // this.getSliderData();
    },

    methods: {

      async getCatProductData(page = 1) {
        let categoryId = this.$route.query.id;
        this.load = true;
        let r = await this.$axios.$get('/api/all/client-cat-product/'+categoryId+'?page='+page)
        this.cat_product_list = r.data;
        this.total = r.data.total;

        this.per_page = r.data.per_page;
        this.load = false;

        this.categoryId = categoryId;

      },
    },
    watch: {
      '$route.query': '$fetch'
    },
    async fetch() {
      // Called also on query changes
      this.getCatProductData();
    },

    mounted() {
      //
    },


  }

</script>

<style scoped>

</style>

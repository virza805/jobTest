<template>
  <div class="home_con">
    <h3 class="text-xl md:text-4xl mb-6">Show all Category</h3>
    <div class="cat_wrap flex-wrap flex my-3">
      <div v-for="cat in cat_slider_list" :key="cat.id" class="bg-gray-200 p-4 m-1 ">
        <nuxt-link :to="`/category/?id=${cat.id}`" class=" text-center">
          <div class="h-32 flex justify-center items-center">
            <img src="~/assets/img/carousel-img-2.png" alt="">
          </div>
          <h4 class="text-xl">{{ cat.name }}</h4>
        </nuxt-link>
      </div>
    </div>

    <div class="flex justify-between items-start my-4">
      <h3 class="text-xl md:text-4xl mb-6">Show all product</h3>
      <label class="relative block">
        <span class="sr-only">Search</span>
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
          <img src="~/assets/img/search.png" alt="">
        </span>
        <input
          class="placeholder:italic placeholder:text-red-400 block bg-green-100 w-full border border-red-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-green-500 focus:ring-green-500 focus:ring-1 sm:text-sm"
          placeholder="Search for anything..." type="text" @keyup="search($event.target.value)" name="search" />
      </label>
    </div>
    <div class="flex items-center mb-10">
      <div style="height: 3px" class="w-32 bs-dark-green-bg"></div>
      <div style="height: 2px" class="w-full bg-gray-200"></div>
    </div>

    <div class="flex flex-wrap ">
      <div v-if="load" class="text-xl my-3 text-red-400 font-medium text-center "> Loading ... .. .</div>

      <div v-for="product in product_list.data" :key="product.id" class="w-1/2 md:w-1/4 px-4 mb-10">

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
              <!-- <nuxt-link :to="`/productDetails/?id=${cat.id}`" class="round-link "><img src="~/assets/img/arrow-right.png" alt=""></nuxt-link> -->

            </div>
          </div>

          <h4 class="text-xl mb-3">{{ product.name }}</h4>
          <p><span class="font-medium bs-dark-orange-color">$ {{ product.price }} </span> <del
              class="text-gray-400">${{ product.sell_price }}</del></p>

        </div>
      </div>
    </div>

    <div class="text-center mb-10">
      <pagination v-model="page" :records="total" :per-page="per_page" @paginate="getProductData"></pagination>
    </div>
  </div>
</template>

<script>
  import Footer from '../components/Footer.vue'
  import Header from '../components/Header.vue'
  import SingleProductBox from '../components/SingleProductBox.vue'

  // import dealsOfTheDayProducts from '../assets/css/deals-of-the-day-products.json'

  export default {
    head: {
      title: "Home",
    },
    name: 'IndexPage',
    components: {
      Header,
      Footer,
      SingleProductBox
    },
    data() {
      return {

        dealsOfTheDayProducts: [],

        slider_list: {},
        hero_slider: {},
        cat_list: {},
        cat_slider_list: {},
        page: 1,
        data: [],
        per_page: 0,
        total: 0,
        product_list: {},
        search_key: '',

      }
    },

    created: function () {

      // this.getCatData();
      this.getCatSliderData();
      this.getProductData();
      // this.getSliderData();
    },

    methods: {

      // for Category Slider Show data
      async getCatSliderData() {
        this.load = true;
        let r = await this.$axios.$get('/api/all/client-categories')
        this.cat_slider_list = r.data;
        this.load = false;
      },


      // Product Show with Search & Paginate data
      async getProductData(page = 1) {
        this.load = true;
        let url = `/api/all/client-product?page=${page}`;
        if (this.search_key.length > 0) {
          url += `&key=${this.search_key}`;
        }

        let r = await this.$axios.$get(url)
        this.product_list = r.data;
        this.total = r.data.total;
        this.per_page = r.data.per_page;
        this.load = false;

      },
      search: function (key) {
        // console.log(key);
        this.search_key = key;
        this.getProductData();
      },


    },



  }

</script>
<style>
  .hero-slide .slick-list .slick-track {
    display: flex;
  }

  .category-carousel.slick-slider.slick-initialized {
    position: relative;
  }

  .category-carousel button.slick-arrow.slick-next {
    position: absolute;
    right: 0;
    top: 0;
  }

  .category-carousel button {
    margin-bottom: 20px;
  }

  .slick-list {
    overflow-x: hidden;
  }

  .cat-item:nth-child(even) .category {
    background: #fff0dc;
  }

  .cat-item:nth-child(odd) .category {
    background: #ddf1d6;
  }

  .cat-item:nth-child(even) .buy-get {
    background: #f2cddf;
  }

  .cat-item:nth-child(odd) .buy-get {
    background: #beefbf;
  }

  .round-link {
    @apply h-12 w-12 flex justify-center items-center rounded-full bg-white
  }
  .home_con {
    width: 94%;
    margin: 0 auto;
  }
</style>

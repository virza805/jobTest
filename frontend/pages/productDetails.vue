<template>
  <div class="container py-6">
    <div class="flex">
      <div class="w-full absolute md:bg-transparent bg-green-100 md:relative md:w-1/4 pr-6">
        <!-- <Sidebar /> -->
      </div>
      <div class="w-full md:w-3/4">


        <div class="flex flex-wrap">
          <div class="w-1/2 px-8">
            <!-- <img :src="product.image" /> -->
            <img class="h-48 w-full object-cover md:h-full md:w-48" src="~/assets/img/Thanks.jpg" alt="Man looking at item at a store">
          </div>
          <div class="w-1/2 px-8">
            <p class="text-sm mb-3"><span class="uppercase text-gray-400 pr-6">Status</span> <span
                class="bs-dark-green-color">In Stock</span></p>
            <h3 class="text-2xl">{{ product_details.name }}</h3>
            <p class="text-xs text-gray-400 mb-4 mt-2"><b>7</b> items available.</p>
            <p class="text-2xl font-bold">$ {{ product_details.sell_price }}  <del
                class="font-normal text-gray-400">$ {{ product_details.price }} </del></p>
            <div class="flex my-6">
              <input type="number" class="w-10 border border-gray-200 mr-5 text-center" value="1">
              <button class="bs-button">Add to cart</button>
            </div>

            <div class="flex border-b border-gray-200 justify-between text-sm pb-3 mb-8">
              <p class="flex items-center"><img src="~/assets/img/heart.png" class="w-4 mr-3" alt=""> Add to favourites
              </p>
              <p class="flex items-center">
                &rarrlp;
                Share
              </p>
            </div>

            <div class="text-xs leading-loose">
              <p><span class="uppercase text-gray-400 w-20 inline-block">Sku:</span>
                tag
              </p>
              <p><span class="uppercase text-gray-400 w-20 inline-block">category:</span> Category
                <!-- {{ product_details.category.name }} -->
              </p>

              <p><span class="uppercase text-gray-400 w-20 inline-block">tags:</span>

                tag
              </p>
            </div>
          </div>
          <div class="flex-wrap my-5 ">
            {{ product_details.description }}
          </div>
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
        product_details: {},
        // page: 1,
        // data: [],
        // per_page: 0,
        // total: 0,
      }
    },

    created: function () {
      // this.getData();
      this.getCatProductData();
      // this.getSliderData();
    },

    methods: {

      async getCatProductData() {
        let productId = this.$route.query.id;

        this.load = true;
        let productData = await this.$axios.$get('/api/all/client-product-detail/' + productId)
        this.product_details = productData;
        this.load = false;

      },
    },
    // watch: {
    //   '$route.query': '$fetch'
    // },
    // async fetch() {
    //   // Called also on query changes
    //   this.getCatProductData();
    // },

    mounted() {
      //
    },


  }

</script>

<style scoped>

</style>

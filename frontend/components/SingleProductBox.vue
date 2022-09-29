<template>

  <div class="single-bs-product">
    <div class="h-80  relative mb-6">
      <div class="h-full bg-gray-50 flex justify-center items-center p-4">
        <img :src="product.image" alt="">
      </div>

      <div class="product-img-hover absolute h-full w-full top-0 left-0 flex justify-center items-center">
        <div class="bg-black absolute h-full w-full opacity-60"></div>
        <button @click.prevent="productDetails"
          class=" absolute left-0 bottom-0 bg-gray-200 p-2 w-full flex items-center justify-center">Details <svg
            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </button>

        <div v-if="!matched" class="relative z-10">
          <button @click.prevent="addToCart(product, 'plus')" class=" text-white text-2xl">Add to Card</button>
        </div>


        <div v-if="matched" class=" relative z-10">
          <div class="flex justify-center items-center text-4xl text-white mb-8">
            <button @click.prevent="addToCart(product, 'minus')"
              class="h-12 w-12 border border-white rounded-full">-</button>
            <span class="mx-6">{{ quantity }}</span>
            <button @click.prevent="addToCart(product, 'plus')"
              class="h-12 w-12 border border-white rounded-full">+</button>
          </div>
        </div>

      </div>
    </div>

    <h4 class="text-xl mb-3">{{ product.name }}</h4>
    <p><span class="font-medium bs-dark-orange-color">${{ product.sale }}</span> <del
        class="text-gray-400">${{ product.price }}</del></p>

  </div> <!-- end 1 product--->
</template>

<script>
  export default {
    name: "SingleProductBox",
    props: ["product"],
    data() {
      return {
        matched: false,
        quantity: ''
      }
    },
    methods: {
      productDetails() {
        this.$store.dispatch("product-details-modal/triggerModal", this.product);
      },
      addToCart(product, type) {
        this.$store.dispatch("cart/addToCart", {
          product: product,
          type: type
        });
      },
      productChecker() {
        const getProductsLocalStorage = JSON.parse(localStorage.getItem('cart'));
        const getProductsStore = this.$store.getters["cart/getCart"];

        let cart = [];
        if (getProductsStore.length) {
          cart = getProductsStore;
        } else {
          cart = getProductsLocalStorage;
        }


        if (cart.length) {
          cart.forEach(item => {
            if (item.id === this.product.id) {
              this.matched = true;
              this.quantity = item.quantity
            }

          });
        }

      }
    },
    mounted() {
      this.productChecker()
      // Watch function

      this.$store.watch(
        () => {
          return this.$store.getters["cart/getCart"]
        },
        (val) => {
          this.productChecker()
        }, {
          deep: true
        }
      );


    }

  }

</script>

<style>

</style>

<template>
  <div>
    <Toaster />
    <Header />
      <Nuxt />
    <Footer />
  </div>
</template>

<script>
import Footer from '../components/Footer.vue'
import Header from '../components/Header.vue'
import Toaster from '../components/Toaster.vue'

export default {
  name: 'default',
  components: { Header, Footer, Toaster },
}
</script>

<template>
  <shopping-cart />
</template>
<script>
  import ShoppingCart from '../components/ShoppingCart';
  import { mapActions } from "vuex";

  export default {
    name: 'cart',
    components: {
      ShoppingCart
    },

    created() {
      this.$store.dispatch('cart/loadCartData');
    }
  }
</script>

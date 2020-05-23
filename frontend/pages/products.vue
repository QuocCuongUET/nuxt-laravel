<template>
  <store />
</template>

<script>
import Store from '../components/Store';
import { mapActions } from "vuex";

export default {
  name: 'products',
  components: {
    Store
  },
  async fetch ({ store }) {
    await store.dispatch('products/GET_PRODUCTS');
  },


}
</script>

<template>
  <store />
</template>

<script>
import Store from '../components/Store';

export default {
  name: 'products',
  components: {
    Store
  },
  async fetch ({ store }) {
    await store.dispatch('products/GET_PRODUCTS');
  }
}
</script>

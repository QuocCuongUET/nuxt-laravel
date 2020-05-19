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
  async fetch ({$axios, store}) {
    let response = await $axios.get('/products');
    let products = response.data.products;
    let data = {
      'pdata': products,
      'cdata': []
    }

    store.commit('products/setData', data);
  }
}
</script>

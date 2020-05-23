<template>
    <div>
        <div v-for="p in products" v-bind:key="p.id" class="card m-1 p-1 bg-light">
            <h4>
                {{p.attributes.name}}
                <span class="badge badge-pill badge-primary float-right">
                    {{ p.attributes.price | currency}}
                </span>
            </h4>
            <div class="card-text bg-white p-1">
              {{ p.description }}
              <button class="btn btn-success btn-sm float-right"
                      @click="handleProductAdd(p)">
                      Add To Card
              </button>
            </div>
        </div>
        <page-controls />
        <div class="text-center">
          <nuxt-link to="/cart" class="btn btn-secondary m-3 text-center">Cart</nuxt-link>
        </div>
    </div>
</template>

<script>
    import { mapState, mapGetters, mapMutations } from "vuex";
    import PageControls from "./PageControls";
    export default {
        name: 'product-list',
        components: {PageControls},
        computed: {
            ...mapState('products', ["products"]),
            ...mapGetters('products', {products: "processedProducts"})
        },
        filters: {
            currency(value) {
                return new Intl.NumberFormat("en-US", { style: "currency", currency: "USD"}).format(value);
            }
        },
        methods: {
          ...mapMutations('cart', { addProduct: "addProduct"}),
          handleProductAdd(product) {
            this.addProduct(product);
          }
        }
    }
</script>

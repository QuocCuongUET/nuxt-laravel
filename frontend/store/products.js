export const state = () => ({
    products: [],
    categoriesData: [],
    productsTotal: 0,
    currentPage: 1,
    pageSize: 4,
    currentCategory: "All"
})

export const getters = {
    processedProducts: (state, getters) => {
        let index = (state.currentPage -1) * state.pageSize;
        return getters.productsFilteredByCategory.slice(index, index + state.pageSize);
    },
    pageCount: (state, getters) => Math.ceil(getters.productsFilteredByCategory.length / state.pageSize),
    productsFilteredByCategory: state => state.products
        .filter(p => state.currentCategory == 'All' || p.category == state.currentCategory),
    categories: state => ["All", ...state.categoriesData]
}

export const mutations= {
    setCurrentPage(state, page) {
        state.currentPage = page;
    },
    setPageSize(state, size) {
        state.pageSize = size;
        state.currentPage = 1;
    },
    setCurrentCategory(state, category) {
        state.currentCategory = category;
        state.currentPage = 1;
    },
    SET_PRODUCTS(state, data) {
      state.products = data.pdata;
      state.productsTotal = data.pdata.length;
      state.categoriesData = data.cdata.sort();
    },
}

export const actions = {
  async GET_PRODUCTS ({ commit }) {
    let response  = await this.$axios.get('/products');
    let products = response.data.data;
    console.log(products);
    let data = {
      'pdata': products,
      'cdata': []
    }
    commit('SET_PRODUCTS', data);
  }
}


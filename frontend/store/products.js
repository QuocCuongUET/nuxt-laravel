const testData = [];

for (let i = 1; i <= 10; i++) {
    testData.push({
        id: i, name: `Product #${i}`, category: `Category ${i % 3}`,
        description: `This is Product #${i}`, price: i * 50
    })
}

export const state = {
    products: testData,
    productsTotal: testData.length,
    currentPage: 1,
    pageSize: 4,
    currentCategory: "All"
}

export const getters = {
    processedProducts: (state, getters) => {
        let index = (state.currentPage -1) * state.pageSize;
        return getters.productsFilteredByCategory.slice(index, index + state.pageSize);
    },
    pageCount: (state, getters) => Math.ceil(getters.productsFilteredByCategory.length / state.pageSize),
    productsFilteredByCategory: state => state.products
        .filter(p => state.currentCategory == 'All' || p.category == state.currentCategory),
    categories: state => ["All", ...new Set(state.products.map(p => p.category).sort())]
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
    }
}


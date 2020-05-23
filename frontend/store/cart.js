export const state = () => ({
  lines: []
});

export const getters = {
  itemCount: state => state.lines.reduce((total, line) => total + line.quantity, 0),
  totalPrice: state => state.lines.reduce((total, line) => total + (line.quantity * line.product.price), 0),
}

export const mutations = {
  addProduct(state, product) {
    let line = state.lines.find(line => line.product.id == product.id);
    if (line != null) {
      line.quantity++;
    } else {
      state.lines.push({ product: product, quantity:1 });
    }

    if (process.client) {
      localStorage.setItem("cart", JSON.stringify(state.lines));
    }
  },
  changeQuantity(state, update) {
    update.line.quantity = update.quantity
  },
  removeProduct(state, lineToRemove) {
    let index = state.lines.findIndex(line => line == lineToRemove);
    if (index > -1) {
      state.lines.splice(index, 1);
    }
  },
  setCartData(state, data) {
    state.lines = data;
  }
}

export const actions = {
  loadCartData(context) {
    if (process.client) {
      let data = localStorage.getItem("cart");
      if (data != null) {
        context.commit("setCartData", JSON.parse(data));
      }
    }
  },
  storeCartData(context) {
    if (process.client) {
      localStorage.setItem("cart", JSON.stringify(context.state.lines));
    }
  },
  clearCartData(context) {
    context.commit("setCartData", []);
  },
  initializeCart(context, store) {
    context.dispatch("loadCartData");
    console.log('inininin');
    store.watch(state => state.cart.lines,
      () => context.dispatch("storeCartData"), { deep: true});
    }
}






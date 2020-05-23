import Vue from 'vue'

Vue.filter(
  "currency",
  (value) => new Intl.NumberFormat(
    "en-US",
    {
      style: "currency",
      currency: "USD"
    }
  ).format(value));

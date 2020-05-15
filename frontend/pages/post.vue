<template>
  <div>
    <h1>Name: {{ user }}</h1>
    <button @click="getUser">Get Name</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: ''
    }
  },
  methods: {
    getUser() {
      this.$axios.get('/user')
        .then((res) => {
          console.log(res.data);
          this.user = res.data;
        })
    }
  }
}
</script>

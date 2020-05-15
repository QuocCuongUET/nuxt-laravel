<template>
  <div>
    <button @click="loginWithGoogle">Login With Google</button>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
  methods: {
    async loginWithGoogle() {
      try {
        await this.$auth.loginWith('google')
      } catch (err) {}
    }
  }
}
</script>

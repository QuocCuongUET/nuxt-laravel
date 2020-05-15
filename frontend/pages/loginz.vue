<template>
  <div>
    <button @click="loginWithGoogle">Login With Google</button>
    <button @click="loginWithFacebook">Login With Facebook</button>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
  methods: {
    loginWithGoogle() {
      this.$auth.loginWith('google')
    },
    loginWithFacebook() {
      this.$auth.loginWith('facebook')
    }
  }
}
</script>

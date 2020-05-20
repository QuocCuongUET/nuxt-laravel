<template>
  <div class="container">
    <div>
      <div v-if="$auth.loggedIn">
        <h2 class="subtitle">{{ $auth.user.email }}</h2>
        <h2 class="subtitle">{{ $auth.user.given_name }}</h2>
        <h2 class="subtitle">{{ $auth.user.sub }}</h2>
        <button @click="logout">Logout</button>
        <button @click="loginToken">LoginToken</button>
        <nuxt-link to="/post">Posts</nuxt-link>
        <nuxt-link to="/products">Product</nuxt-link>
      </div>
      <div v-else>
        <h2> Not Log In</h2>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  auth: false,
  data() {
    return {
      user: '',
      loginData: {
        token: '',
        provider: ''
      }
    }
  },
  methods: {
    logout() {
      this.$auth.logout()
    },
    loginToken() {
      this.loginData.token = this.getCookie('auth._token.google').split(' ')[1]
      this.loginData.provider = this.$auth.strategy.name
      console.log(this.loginData)
      this.$auth.loginWith('local', { data: this.loginData })
    },
    getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
  }
}
</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>

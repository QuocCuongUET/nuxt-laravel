<template>
  <div>
    <div id="logreg-forms">
      <form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">
          Sign in
        </h1>
        <div class="social-login">
          <button class="btn facebook-btn social-btn" type="button" @click="loginWithFacebook">
            <span>
              <i class="fab fa-facebook-f"></i>Sign in with Facebook
            </span>
          </button>
          <button class="btn google-btn social-btn" type="button" @click="loginWithGoogle">
            <span>
              <i class="fab fa-google-plus-g"></i>Sign in with Google+
            </span>
          </button>
        </div>
        <p style="text-align:center">OR</p>
        <input
          id="inputEmail"
          type="email"
          class="form-control"
          placeholder="Email address"
          required=""
          autofocus=""
        />
        <input
          id="inputPassword"
          type="password"
          class="form-control"
          placeholder="Password"
          required=""
        />

        <button class="btn btn-success btn-block" type="submit">
          <i class="fas fa-sign-in-alt"></i>Sign in
        </button>
        <a id="forgot_pswd" href="#">Forgot password?</a>
        <hr />
        <!-- <p>Don't have an account!</p>  -->
        <button id="btn-signup" class="btn btn-primary btn-block" type="button">
          <i class="fas fa-user-plus"></i>Sign up New Account
        </button>
      </form>

      <form action="/reset/password/" class="form-reset">
        <input
          id="resetEmail"
          type="email"
          class="form-control"
          placeholder="Email address"
          required=""
          autofocus=""
        />
        <button class="btn btn-primary btn-block" type="submit">
          Reset Password
        </button>
        <a id="cancel_reset" href="#"><i class="fas fa-angle-left"></i>Back</a>
      </form>

      <form action="/signup/" class="form-signup">
        <div class="social-login">
          <button class="btn facebook-btn social-btn" type="button">
            <span><i class="fab fa-facebook-f"></i>Sign up with Facebook</span>
          </button>
        </div>
        <div class="social-login">
          <button class="btn google-btn social-btn" type="button">
            <span>
              <i class="fab fa-google-plus-g"></i>Sign up with Google+
            </span>
          </button>
        </div>

        <p style="text-align:center">OR</p>

        <input
          id="user-name"
          type="text"
          class="form-control"
          placeholder="Full name"
          required=""
          autofocus=""
        />
        <input
          id="user-email"
          type="email"
          class="form-control"
          placeholder="Email address"
          required
          autofocus=""
        />
        <input
          id="user-pass"
          type="password"
          class="form-control"
          placeholder="Password"
          required
          autofocus=""
        />
        <input
          id="user-repeatpass"
          type="password"
          class="form-control"
          placeholder="Repeat Password"
          required
          autofocus=""
        />

        <button class="btn btn-primary btn-block" type="submit">
          <i class="fas fa-user-plus"></i>Sign Up
        </button>
        <a id="cancel_signup" href="#"><i class="fas fa-angle-left"></i>Back</a>
      </form>
      <br />
    </div>
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
<style>
/* sign in FORM */
#logreg-forms {
  width: 412px;
  margin: 10vh auto;
  background-color: #f3f3f3;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
}
#logreg-forms form {
  width: 100%;
  max-width: 410px;
  padding: 15px;
  margin: auto;
}
#logreg-forms .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
#logreg-forms .form-control:focus {
  z-index: 2;
}
#logreg-forms .form-signin input[type='email'] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
#logreg-forms .form-signin input[type='password'] {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

#logreg-forms .social-login {
  width: 390px;
  margin: 0 auto;
  margin-bottom: 14px;
}
#logreg-forms .social-btn {
  font-weight: 100;
  color: white;
  width: 190px;
  font-size: 0.9rem;
}

#logreg-forms a {
  display: block;
  padding-top: 10px;
  color: lightseagreen;
}

#logreg-form .lines {
  width: 200px;
  border: 1px solid red;
}

#logreg-forms button[type="submit"] {
  margin-top: 10px;
}

#logreg-forms .facebook-btn {
  background-color: #c589c;
}

#logreg-forms .google-btn {
  background-color: #df4b3b;
}

#logreg-forms .form-reset,
#logreg-forms .form-signup {
  display: none;
}

#logreg-forms .form-signup .social-btn {
  width: 210px;
}

#logreg-forms .form-signup input {
  margin-bottom: 2px;
}

.form-signup .social-login {
  width: 210px !important;
  margin: 0 auto;
}

/* Mobile */

@media screen and (max-width: 500px) {
  #logreg-forms {
    width: 300px;
  }

  #logreg-forms .social-login {
    width: 200px;
    margin: 0 auto;
    margin-bottom: 10px;
  }
  #logreg-forms .social-btn {
    font-size: 1.3rem;
    font-weight: 100;
    color: white;
    width: 200px;
    height: 56px;
  }
  #logreg-forms .social-btn:nth-child(1) {
    margin-bottom: 5px;
  }
  #logreg-forms .social-btn span {
    display: none;
  }
  #logreg-forms .facebook-btn:after {
    content: 'Facebook';
  }

  #logreg-forms .google-btn:after {
    content: 'Google+';
  }
}
</style>

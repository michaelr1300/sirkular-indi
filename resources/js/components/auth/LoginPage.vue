<template>
  <div class="d-block d-sm-flex flex-row-reverse" style="height: 100vh; overflow: hidden">
    <div class="col-12 px-3 col-sm-7 mt-4">
      <div class="mx-auto">
        <img class="img-header-icon" src="/images/icon-indi-pair-color.svg" alt="logo-indi"/>
      </div>
      <h4 class="fw-bold mt-4">MASUK</h4>
      <div class="fw-bold">Masuk kembali ke akun Anda</div>
      <div class="mt-4">
        <form @submit.prevent="doLogin">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
              id="email" 
              name="email" 
              type="email" 
              class="form-control" 
              placeholder="Email Anda"
              v-model="form.email"
              :class="{ 'is-invalid': hasErrors('email') }"
            />
            <div class="invalid-feedback">
              {{ getErrors("email") }}
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
              id="password" 
              name="password" 
              type="password" 
              class="form-control" 
              placeholder="Password Anda"
              v-model="form.password"
              :class="{ 'is-invalid': hasErrors('password') }"
            />
            <div class="invalid-feedback">
              {{ getErrors("password") }}
            </div>
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox form-check-inline">
                <input
                  type="checkbox"
                  class="custom-control-input"
                  id="remember_me"
                  v-model="form.remember"
                />
                <label for="remember_me" class="custom-control-label inline-flex items-center">Remember me</label>
            </div>
          </div>
          <div class="mt-3">
            <button  
              type="submit"
              class="btn btn-primary w-100"
              :disabled="isLoading"
            >
              Login
            </button>
          </div>
        </form>
        <p class="text-center text-muted mt-2">
              Belum punya akun? Daftar
              <span><a href="/register">di sini.</a></span>
          </p>
          <p class="text-center text-muted mt-2">
              <span><a href="/password/reset">Lupa Password?</a></span>
          </p>
      </div>
    </div>
    <div class="col-12 col-sm-5 h-100">
      <img class="img img-fluid" src="images/login-page.png" alt="img-login">
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null,
        remember: true,
      },
      isLoading: false,
      errors: {}
    }
  },
   methods: {
    async doLogin() {
      this.isLoading = true;

      try {
        let response = await axios.post("/login", this.form);
        window.location = "/"
      } catch (error) {
        console.log(error)
        this.errors = error.response.data.errors;
        this.form.password = '';
      } finally {
        this.isLoading = false;
      }

    },
    
    hasErrors(key) {
      if (this.errors[key]) {
        return true;
      }
      return false;
    },
    getErrors(key) {
      if (this.hasErrors(key)) {
        return this.errors[key].join(", ");
      }
      return "";
    },
  }
}
</script>

<style>

</style>
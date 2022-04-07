<template>
  <div class="d-block d-sm-flex flex-row-reverse" style="height: 100vh; overflow: hidden">
    <div class="col-12 px-3 col-sm-7 mt-4">
      <div class="mx-auto">
        <img class="img-header-icon" src="/images/icon-indi-pair-color.svg" alt="logo-indi"/>
      </div>
      <h4 class="fw-bold mt-4">DAFTAR</h4>
      <div class="fw-bold">Silakan daftar sebagai akun baru</div>
      <div class="mt-4">
        <form @submit.prevent="doLogin">
          <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input 
              id="name" 
              name="name" 
              type="text" 
              class="form-control" 
              placeholder="Nama Anda"
              v-model="form.name"
              :class="{ 'is-invalid': hasErrors('name') }"
            />
            <div class="invalid-feedback">
              {{ getErrors("name") }}
            </div>
          </div>
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
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input 
              id="password_confirmation" 
              name="password_confirmation" 
              type="password" 
              class="form-control" 
              placeholder="Konfirmasi password Anda"
              v-model="form.password_confirmation"
              :class="{ 'is-invalid': hasErrors('password_confirmation') }"
            />
            <div class="invalid-feedback">
              {{ getErrors("password_confirmation") }}
            </div>
          </div>
          <div class="mt-3">
            <button  
              type="submit"
              class="btn btn-primary w-100"
              :disabled="isLoading"
            >
              Daftar
            </button>
          </div>
        </form>
        <p class="text-center text-muted mt-2">
          Sudah punya akun? Masuk
          <span><a href="/login">di sini.</a></span>
        </p>
      </div>
    </div>
    <div class="col-12 col-sm-5 h-100">
      <img class="img img-fluid" src="images/register-page.png" alt="img-register">
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
      isLoading: false,
      errors: {}
    }
  },
   methods: {
    async doLogin() {
      this.isLoading = true;

      try {
        let response = await axios.post("/register", this.form);
        window.location = "/"
      } catch (error) {
        this.errors = error.response.data.errors;
        this.form.password = '';
        this.form.password_confirmation = '';
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
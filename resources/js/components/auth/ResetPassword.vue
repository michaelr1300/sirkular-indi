<template>
  <div class="w-md-50 mx-auto">
    <div class="card border-0 shadow my-auto" style="border-radius: 0.5em">
      <div class="card-body">
          <div class="text-center mb-3">
            <img src="/images/icon-indi-pair-color.svg" alt="logo_indi">
          </div>
          <p class="text-justify text-muted w-100 my-4">
            Masukkan password baru untuk akun Anda. 
          </p>

          <input type="hidden" name="token" v-model="form.token">
          <input type="hidden" name="email" v-model="form.email">

          <div class="form-group mt-3" >
            <label for="password">Password</label>
            <input type="password" v-model="form.password" class="form-control" :class="{ 'is-invalid': hasErrors('password') }"/>
            <div class="invalid-feedback">
              {{ getErrors("password") }}
            </div>
          </div>

          <div class="form-group mt-3" >
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" v-model="form.password_confirmation" class="form-control" :class="{ 'is-invalid': hasErrors('password_confirmation') }"/>
            <div class="invalid-feedback">
              {{ getErrors("password_confirmation") }}
            </div>
          </div>

          <div class="form-group mt-4 text-right">
            <button
              class="btn btn-primary w-100"
              :disabled="isLoading"
              @click="doResetPassword()"
            >
              Reset Password
            </button>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ResetPassword",

  props: {
    email: {
      type: String
    },
    token: {
      type: String
    }
  },

  data() {
    return {
      form: {
        token: this.token,
        email: this.email,
        password: null,
        password_confirmation: null,
      },
      isLoading: false,
      errors: {},
    };
  },

  methods: {
    async doResetPassword() {
      this.isLoading = true;

      try {
        let response = await axios.post("/password/reset", this.form);
        await axios.post("/login", this.form);
        return window.location.href = '/';
      } catch (error) {
        console.log(error.response);
        this.errors = error.response.data.errors;
      }

      this.isLoading = false;
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
  },
};
</script>

<style lang="scss" scoped>

</style>
<template>
  <div class="d-md-flex flex-row justify-content-center" style="min-height: 100vh">
    <div class="d-none d-md-block col-md-3 profile-side" style="height: inherit">
      <h1 class="text-uppercase mt-5 ms-5" style="font-size: 5vw; font-weight: 900;">Profil</h1>
    </div>
    <div class="col-12 col-md-9 mx-4 mt-5">
      <h1 class="text-uppercase font-weight-bold">Informasi Akun</h1>
      <div class="d-flex flex-column my-3">
        <div class="d-flex mb-3">
          <div class="col-3 text-secondary my-auto font-weight-bold">
              Nama
          </div>
          <div class="col-6">
              <div v-show="!isEdit" class="my-auto">
                {{ user.name }}
              </div>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.name"
                  :class="{ 'is-invalid': hasErrors('name') }"
                />
                <div class="invalid-feedback">
                  {{ getErrors("name") }}
                </div>
              </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="col-3 text-secondary my-auto font-weight-bold">
              Email
          </div>
          <div class="col-6">
              <div v-show="!isEdit" class="my-auto">
                {{ user.email }}
              </div>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.email"
                  :class="{ 'is-invalid': hasErrors('email') }"
                  />
                  <div class="invalid-feedback">
                    {{ getErrors("email") }}
                  </div>
              </div>
          </div>
        </div>
        <div class="d-flex mb-3"> 
          <div class="col-3 text-secondary my-auto font-weight-bold">
              Alamat
          </div>
          <div class="col-6">
              <div v-show="!isEdit" class="my-auto">
                {{ user.address }}
              </div>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.address"
                  :class="{ 'is-invalid': hasErrors('address') }"
                />
                <div class="invalid-feedback">
                  {{ getErrors("address") }}
                </div>
              </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="col-3 text-secondary my-auto font-weight-bold">
              Nomor Telepon
          </div>
          <div class="col-6">
              <div v-show="!isEdit" class="my-auto">
                {{ user.phone_number }}
              </div>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.phone_number"
                  :class="{ 'is-invalid': hasErrors('phone_number') }"
                />
                <div class="invalid-feedback">
                  {{ getErrors("phone_number") }}
                </div>
              </div>
          </div>
        </div>
        <div class="d-md-flex">
          <button
              v-show="!isEdit"
              class="btn btn-primary col-12 col-md-4 me-3"
              @click="isEdit = true"
          >
              Ubah Profil
          </button>

          <button
              v-show="isEdit && !isLoading"
              class="btn btn-success col-12 col-md-2 me-3"
              @click="doUpdate()"
          >
              Simpan
          </button>
          <button
              v-show="isEdit && isLoading"
              disabled
              class="btn btn-success col-12 col-md-2 mx-3"
          >
              Menyimpan
          </button>
          <button
              v-show="isEdit && !isLoading"
              class="btn btn-outline-primary col-12 col-md-2 mx-3"
              @click="doResetEdit()"
          >
              Batal
          </button>
          <button
              v-show="isEdit && isLoading"
              disabled
              class="btn btn-outline-primary col-12 col-md-2 mx-3"
          >
              Batal
          </button>

          <button
              v-show="!isUpdatePassword"
              class="btn btn-primary col-12 col-md-4 mx-3"
              @click="isUpdatePassword = true"
          >
              Ubah Password
          </button>
        </div>
        <div v-show="isUpdatePassword" class="mt-4">
          <div v-if="!user.has_no_password" class="d-flex my-3">
              <div class="col-3 my-auto text-secondary font-weight-bold">
                  Password Lama
              </div>
              <div class="col-6">
                  <div class="form-group mb-0">
                      <input
                      type="password"
                      class="form-control"
                      :class="{ 'is-invalid': hasErrors('old_password') }"
                      v-model="form.old_password"
                      />
                      <div class="invalid-feedback">
                          {{ getErrors("old_password") }}
                      </div>
                  </div>
              </div>
          </div>
          <div class="d-flex my-3">
              <div class="col-3 my-auto text-secondary font-weight-bold">
                  Password Baru
              </div>
              <div class="col-6">
                  <div class="form-group mb-0">
                      <input
                      type="password"
                      class="form-control"
                      :class="{ 'is-invalid': hasErrors('password') }"
                      v-model="form.password"
                      />
                      <div class="invalid-feedback">
                          {{ getErrors("password") }}
                      </div>
                  </div>
              </div>
          </div>
          <div class="d-flex my-3">
              <div class="col-3 my-auto text-secondary font-weight-bold">
                  Konfirmasi Password
              </div>
              <div class="col-6">
                  <div class="form-group mb-0">
                      <input
                      type="password"
                      class="form-control"
                      :class="{ 'is-invalid': hasErrors('password_confirmation') }"
                      v-model="form.password_confirmation"
                      />
                      <div class="invalid-feedback">
                          {{ getErrors("password_confirmation") }}
                      </div>
                  </div>
              </div>
          </div>

          <div class="d-md-flex">
              <button
                  v-show="isUpdatePassword && !isLoading"
                  class="btn btn-success col-12 col-md-2 me-3"
                  @click="doUpdatePassword()"
              >
                  Simpan
              </button>
              <button
                  v-show="isUpdatePassword && isLoading"
                  disabled
                  class="btn btn-success col-12 col-md-2 me-3"
              >
                  Menyimpan
              </button>
              <button
                  v-show="isUpdatePassword && !isLoading"
                  class="btn btn-outline-primary col-12 col-md-2 mx-3"
                  @click="doResetUpdatePassword()"
              >
                  Batal
              </button>
              <button
                  v-show="isUpdatePassword && isLoading"
                  disabled
                  class="btn btn-outline-primary col-12 col-md-2 mx-3"
              >
                  Batal
              </button>
          </div>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      default: null, 
    },
  },
  data() {
    return {
      isEdit: false,
      isUpdatePassword: false,
      form: {...this.user},
      isLoading: false,
      errors: {}
    }
  },
  methods: {
    async doUpdate() {
        this.isLoading = true;
        try {
            var url = "/profile/update";
            let response = await axios.put(url, this.form);
            return location.reload();
        } catch (error) {
            console.log(error.response);
            this.errors = error.response.data.errors;
        }
        this.isLoading = false;
    },
    
    async doUpdatePassword() {
        this.isLoading = true;

        try {
            var url = "/profile/update-password";
            let response = await axios.put(url, this.form);
            return location.reload();
        } catch (error) {
            alert(error.response.data.message);
            console.log(error.response);
            this.errors = error.response.data.errors;
        }
        this.isLoading = false;
    },

    doResetEdit() {
        this.form = {...this.user}
        this.isEdit = false;
        this.isLoading = false;
    },

    doResetUpdatePassword() {
        this.form = {...this.user}
        this.isUpdatePassword = false;
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

<style scoped>
.profile-side{
    font-family: 'Mulish', sans-serif;
    color: #142362;
    background-image: url("../../../assets/background-catalog.png");
    background-size: contain;
    box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
}
</style>

<template>
  <div class="d-md-flex flex-row justify-content-center" style="min-height: 100vh">
    <div class="d-none d-md-block col-md-3 profile-side" style="height: inherit">
      <h1 class="text-uppercase mt-4 ms-5" style="font-size: 5vw; font-weight: 900;">Profil</h1>
    </div>
    <div class="col-12 col-md-9 px-4 mt-3">
      <h1 class="text-uppercase font-weight-bold text-header">Informasi Akun</h1>
      <div class="d-flex flex-column my-3">
        <div class="d-flex mb-3">
          <div class="col-3 text-secondary my-auto font-weight-bold">
              Nama
          </div>
          <div class="col-9 col-md-6">
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
          <div class="col-9 col-md-6">
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
          <div class="col-3 text-secondary font-weight-bold" style="vertical-align: text-top;">
              Alamat
          </div>
          <div class="col-9 col-md-6">
              <div v-show="!isEdit" class="text-area my-auto">{{ user.address }}</div>
              <div class="form-group mb-0">
                <textarea
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
          <div class="col-9 col-md-6">
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
          <div class="d-md-flex col-12 col-md-4 mb-3">
            <button
                v-show="!isEdit"
                class="btn btn-primary w-100"
                @click="isEdit = true"
            >
                Ubah Profil
            </button>
            
            <div v-if="isEdit" class="col-12 col-md-6 pe-md-2 mb-3">
              <button
                  class="btn btn-success w-100"
                  @click="doUpdate()"
                  :disabled="isLoading"
              >
                  {{ isLoading ? 'Menyimpan' : 'Simpan' }}
              </button>            
            </div>
            <div v-if="isEdit" class="col-12 col-md-6 ps-md-2 mb-3">
              <button
                  class="btn btn-outline-primary w-100"
                  @click="doResetEdit()"
                  :disabled="isLoading"
              >
                  Batal
              </button>
            </div>
          </div>
          <div class="col-12 col-md-4 ps-md-3">
            <button
                v-show="!isUpdatePassword"
                class="btn btn-primary w-100"
                @click="isUpdatePassword = true"
            >
                Ubah Password
            </button>
          </div>
        </div>
        <div v-show="isUpdatePassword" class="mt-md-4 mt-2">
          <div v-if="!user.has_no_password" class="d-md-flex my-3">
              <div class="col-12 col-md-3 my-auto text-secondary font-weight-bold">
                  Password Lama
              </div>
              <div class="col-12 col-md-6">
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
          <div class="d-md-flex my-3">
              <div class="col-12 col-md-3 my-auto text-secondary font-weight-bold">
                  Password Baru
              </div>
              <div class="col-12 col-md-6">
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
          <div class="d-md-flex my-3">
              <div class="col-12 col-md-3 my-auto text-secondary font-weight-bold">
                  Konfirmasi Password
              </div>
              <div class="col-12 col-md-6">
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

          <div class="d-md-flex col-md-4">
            <div v-if="isUpdatePassword" class="col-12 col-md-6 pe-md-2 mb-3">
              <button
                  class="btn btn-success w-100"
                  @click="doUpdatePassword()"
                  :disabled="isLoading"
              >
                  {{ isLoading ? 'Menyimpan' : 'Simpan' }}
              </button>            
            </div>
            <div v-if="isUpdatePassword" class="col-12 col-md-6 ps-md-2 mb-3">
              <button
                  class="btn btn-outline-primary w-100"
                  @click="doResetUpdatePassword()"
                  :disabled="isLoading"
              >
                  Batal
              </button>
            </div>
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

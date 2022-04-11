<template>
  <div class="d-md-flex flex-row justify-content-center" style="min-height: 100vh">
    <div class="d-none d-md-block col-md-3 profile-side" style="height: inherit">
      <h1 class="text-uppercase mt-5 ms-5" style="font-size: 5vw; font-weight: 900;">Profil</h1>
    </div>
    <div class="col-12 col-md-9 mx-4 mt-5">
      <h1 class="text-uppercase font-weight-bold">Informasi Akun</h1>
      <div class="d-flex flex-column my-3">
        <div class="d-flex">
          <div class="col-3 text-secondary font-weight-bold">
              Nama
          </div>
          <div class="col-6">
              <span v-show="!isEdit">
                {{ user.name }}
              </span>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.name"
                  />
                  <!-- <div class="invalid-feedback">
                  :class="{ 'is-invalid': hasErrors('name') }"
                      {{ getErrors("name") }}
                  </div> -->
              </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="col-3 text-secondary font-weight-bold">
              Email
          </div>
          <div class="col-6">
              <span v-show="!isEdit">
                {{ user.email }}
              </span>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.email"
                  />
              </div>
          </div>
        </div>
        <div class="d-flex"> 
          <div class="col-3 text-secondary font-weight-bold">
              Alamat
          </div>
          <div class="col-6">
              <span v-show="!isEdit">
                {{ user.address }}
              </span>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.address"
                  />
              </div>
          </div>
        </div>
        <div class="d-flex">
          <div class="col-3 text-secondary font-weight-bold">
              Nomor Telepon
          </div>
          <div class="col-6">
              <span v-show="!isEdit">
                {{ user.phone_number }}
              </span>
              <div class="form-group mb-0">
                  <input
                  type="text"
                  class="form-control"
                  v-show="isEdit"
                  v-model="form.phone_number"
                  />
              </div>
          </div>
        </div>
        <div class="d-md-flex">
          <button
              v-show="!isEdit"
              class="btn btn-primary col-12 col-md-4 mx-3"
              @click="isEdit = true"
          >
              EDIT PROFIL
          </button>

          <button
              v-show="isEdit && !isLoading"
              class="btn btn-success col-12 col-md-2 mx-3"
              @click="doSave()"
          >
              SAVE
          </button>
          <button
              v-show="isEdit && isLoading"
              disabled
              class="btn btn-success col-12 col-md-2 mx-3"
          >
              SAVING
          </button>
          <button
              v-show="isEdit && !isLoading"
              class="btn btn-outline-primary col-12 col-md-2 mx-3"
              @click="doResetEdit()"
          >
              CANCEL
          </button>
          <button
              v-show="isEdit && isLoading"
              disabled
              class="btn btn-outline-primary col-12 col-md-2 mx-3"
          >
              CANCEL
          </button>

          <button
              v-show="!isUpdatePassword"
              class="btn btn-primary col-12 col-md-4 mx-3"
              @click="isUpdatePassword = true"
          >
              GANTI PASSWORD
          </button>
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
      form: {...this.user},
    }
  },
  methods: {
    async doSave() {
        this.isLoading = true;

        try {
            var url = "/profile/update";
            let response = await axios.put(url, this.form);
            return location.reload();
        } catch (error) {
            alert(error.response.data.message);
            console.log(error.response);
            this.errors = error.response.data.errors;
        }
        this.isLoading = false;
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

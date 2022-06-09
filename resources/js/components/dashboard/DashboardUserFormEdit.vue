<template>
  <div>
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="edit-user-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group required-field">
              <label for="name">Nama</label>
              <input 
                id="name"
                name="name"
                type="text"
                class="form-control"
                :class="{ 'is-invalid': hasErrors('name') }"
                required
                v-model="form.name"
              />
              <div v-if="hasErrors('name')" class="invalid-feedback">
                Nama wajib diisi
              </div>
            </div>
            <div class="form-group required-field mt-3">
              <label for="email">Email</label>
              <input 
                id="email"
                name="email"
                type="email"
                class="form-control"
                :class="{ 'is-invalid': hasErrors('email') }"
                v-model="form.email"
                required
              />
              <div v-if="hasErrors('email')" class="invalid-feedback">
                Email wajib diisi dengan email yang valid
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="phone_number">No Telepon</label>
              <input 
                id="phone_number"
                name="phone_number"
                class="form-control"
                v-model="form.phone_number"
              />
            </div>
            <div class="form-group mt-3">
              <label for="address">Alamat</label>
              <textarea 
                id="address"
                name="address"
                type="text-area" 
                class="form-control"
                v-model="form.address"
              ></textarea>
            </div>
            <div class="form-check mt-3">
              <input 
                id="flexCheckChecked" 
                class="form-check-input" 
                type="checkbox" 
                v-model="form.is_admin"
                :checked="form.is_admin">
              <label class="form-check-label" for="flexCheckChecked">
                Jadikan user sebagai admin
              </label>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" :disabled="isLoading" @click="doSubmit()">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    selectedUser: {
      type: Object,
      default: null
    },
  },
  data() {
    return {
      form: {
        id: null,
        content: null,
        reviewer_name: null,
        photo_path: null,
        media_id: null,
      },
      errors: {},
      isLoading: false,
    }
  },
  watch: {
    selectedUser() {
      this.form = { ...this.selectedUser }; 
      this.errors = {};
    }
  },
  methods: {
    async doSubmit() {
      this.isLoading = true;
      try {
        let response = await axios.put(
          `/user/${this.form.id}`,
          this.form
        );
        return location.reload();
      } catch (error) {
        this.errors = error.response.data.errors;
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
  },
};
</script>

<style>

</style>

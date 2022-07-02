<template>
  <div>
    <div class="modal fade" id="edit-package-modal" tabindex="-1" aria-labelledby="edit-package-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Jasa Reproduksi</h5>
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
                v-model="form.name"
              >
              <div v-if="hasErrors('name')" class="invalid-feedback">
                Nama wajib diisi
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="description">Deskripsi</label>
              <textarea 
                id="description"
                name="description"
                type="text-area" 
                class="form-control"
                v-model="form.description"
              ></textarea>
            </div>
            <div class="form-group required-field mt-3">
              <label for="price">Harga Minimal</label>
              <input 
                id="min-price"
                name="min-price"
                type="number"
                min=0 
                class="form-control"
                :class="{ 'is-invalid': hasErrors('min_price') }"
                v-model="form.min_price"
              >
              <div v-if="hasErrors('min_price')" class="invalid-feedback">
                Harga minimal tidak valid
              </div>
            </div>
            <div class="form-group required-field mt-3">
              <label for="price">Harga Maksimal</label>
              <input 
                id="max-price"
                name="max-price"
                type="number"
                min=0 
                class="form-control"
                :class="{ 'is-invalid': hasErrors('max_price') }"
                v-model="form.max_price"
              >
              <div v-if="hasErrors('max_price')" class="invalid-feedback">
                Harga maksimal tidak valid
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="photo" class="form-label">Foto Produk</label>
              <div>
                <label
                  class="btn btn-outline-primary w-100 mx-auto"
                >
                  <input 
                    id="photo" 
                    name="photo"
                    ref="photo"
                    accept="image/*"
                    class="form-control" 
                    type="file" 
                    style="display: none"
                    @change="getFileName($event)"
                  >
                  Ubah Foto
                </label>
                {{ fileName }}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-primary"
              @click="doSubmit()"
              :disabled="isLoading"
            >
              Simpan
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
    selectedPackage: {
      type: Object,
      default: null
    },
  },
  data() {
    return {
      isLoading: false,
      form: {
        id: null,
        name: null,
        min_price: null,
        max_price: null,
        description: null,
      },
      errors: {},
      fileName: '',
    }
  },
  computed: {
    selectedImage() {
      if (this.selectedReview?.photo_path?.length) {
        return this.selectedReview.photo_path[0].url
      }
      return ''; 
    }
  },
  watch: {
    selectedPackage() {
      this.form = { ...this.selectedPackage, media_id: this.selectedReview?.media[0]?.id };  
      this.errors = {};
      this.fileName = '';
      this.$refs.photo.value = '';
    }
  },
  methods: {
    async doSubmit() {
      this.isLoading = true;
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      formData.append("id", this.form.id);
      if (photo) {
        formData.append("photo", photo);
      }
      formData.append("name", this.form.name ?? '');
      formData.append("min_price", this.form.min_price ?? '');
      formData.append("max_price", this.form.max_price ?? '');
      formData.append("description", this.form.description ?? '');
      formData.append("_method", "put");
      try {
        let response = await axios.post(
          `/dashboard/package/${this.form.id}`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
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
    getFileName(event){
      var fileData =  event.target.files[0];
      this.fileName = fileData.name;
    },
  },
};
</script>

<style>

</style>

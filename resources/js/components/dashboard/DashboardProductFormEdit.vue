<template>
  <div>
    <div class="modal fade" id="edit-product-modal" tabindex="-1" aria-labelledby="edit-product-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group required-field">
              <label for="name">Nama Produk</label>
              <input 
                id="name"
                name="name"
                type="text" 
                class="form-control"
                :class="{ 'is-invalid': hasErrors('name') }"
                v-model="form.name"
              >
              <div v-if="hasErrors('name')" class="invalid-feedback">
                Nama produk wajib diisi
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="description">Deskripsi Produk</label>
              <textarea 
                id="description"
                name="description"
                type="text-area" 
                class="form-control"
                v-model="form.description"
              ></textarea>
            </div>
            <div class="form-group required-field mt-3">
              <label for="price">Harga</label>
              <input 
                id="price"
                name="price"
                type="number"
                min=0 
                class="form-control"
                :class="{ 'is-invalid': hasErrors('price') }"
                v-model="form.price"
              >
              <div v-if="hasErrors('price')" class="invalid-feedback">
                Harga tidak valid
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
          <div class="modal-footer justify-content-between">
            <button 
              type="button" 
              class="btn btn-danger" 
              :disabled="isLoading"
              data-bs-toggle="modal" 
              data-bs-target="#delete-modal"
            >
              Hapus
            </button>
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
    selectedProduct: {
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
        price: null,
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
    selectedProduct() {
      this.form = { ...this.selectedProduct, media_id: this.selectedReview?.media[0]?.id };  
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
      formData.append("price", this.form.price ?? '');
      formData.append("description", this.form.description ?? '');
      formData.append("_method", "put");
      try {
        let response = await axios.post(
          `/dashboard/product/${this.form.id}`,
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

<template>
  <div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product-modal">
      Tambah Produk
      <span class="mdi mdi-plus"></span>
    </button>
    <div class="modal fade" id="add-product-modal" tabindex="-1" aria-labelledby="add-product-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group required-field">
              <label for="code">Kode Produk</label>
              <div>
                <small>Kode harus unik untuk setiap produk</small>
              </div>
              <input 
                id="code"
                name="code"
                type="text" 
                class="form-control"
                :class="{ 'is-invalid': hasErrors('code') }"
                v-model="form.code"
              >
              <div v-if="hasErrors('code')" class="invalid-feedback">
                Kode tidak valid
              </div>
            </div>
            <div class="form-group required-field mt-3">
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
                  Pilih Foto
                </label>
                {{ fileName }}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-primary"
              :disabled="isLoading"
              @click="doSubmit()"
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
  data() {
    return {
      isLoading: false,
      form: {
        code: null,
        name: null,
        price: null,
        description: null,
      },
      errors: {},
      fileName: '',
    }
  },
  methods: {
    async doSubmit() {
      this.isLoading = true;
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      if (photo) {
        formData.append("photo", photo);
      }
      formData.append("code", this.form.code ?? '');
      formData.append("name", this.form.name ?? '');
      formData.append("price", this.form.price ?? '');
      formData.append("description", this.form.description ?? '');
      try {
        let response = await axios.post(
          `/dashboard/product`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        return location.reload();
      } catch (error) {
        console.log(error.response)
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

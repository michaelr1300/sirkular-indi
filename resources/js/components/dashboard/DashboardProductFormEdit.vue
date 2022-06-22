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
              <label for="name">Nama Layanan</label>
              <input 
                id="name"
                name="name"
                type="text" 
                class="form-control"
                :class="{ 'is-invalid': hasErrors('name') }"
                v-model="form.name"
              >
              <div v-if="hasErrors('name')" class="invalid-feedback">
                Nama layanan wajib diisi
              </div>
            </div>
            <div class="form-group mt-3">
              <label for="description">Deskripsi Layanan</label>
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
        min_price: null,
        max_price: null,
        description: null,
      },
      errors: {},
    }
  },
  watch: {
    selectedProduct() {
      this.form = { ...this.selectedProduct };  
      this.errors = {};
    }
  },
  methods: {
    async doSubmit() {
      this.isLoading = true;
      try {
        let response = await axios.put(`/dashboard/product/${this.form.id}`, this.form);
        alert("Product Updated");
        return location.reload();
      } catch (error) {
        console.log(error.response);
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

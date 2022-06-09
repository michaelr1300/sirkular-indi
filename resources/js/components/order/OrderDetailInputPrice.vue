<template>
  <div>
    <button
      data-bs-toggle="modal" 
      :data-bs-target="'#input-price-modal-' + order.id"
      class="btn btn-primary"
    >
      Masukkan Harga
    </button>
    <div class="modal fade" :id="'input-price-modal-' + order.id" tabindex="-1" :aria-labelledby="'input-price-modal-' + order.id" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Masukkan Harga Pesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group required-field" >
              <label for="price">Harga (Rp)</label>
              <input 
                id="price"
                name="price"
                type="number"
                min=0
                step="1" 
                required
                class="form-control"
                :class="{ 'is-invalid': hasErrors('price') }"
                v-model="form.price"
              />
              <div v-if="hasErrors('price')" class="invalid-feedback">
                Harga wajib diisi
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button 
              type="button" 
              class="btn btn-primary" 
              :disabled="isLoading" 
              @click="inputPrice()"
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
    order: {
      type: Object,
    },
  },
  methods: {
    async inputPrice() {
      this.isLoading = true;
      try {
        let response = await axios.post(
          `/order/${this.order.id}/updatePrice`,
          this.form,
        );
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
  data() {
    return {
      isLoading: false,
      form: {
        price: null,
      },
      errors: {},
    }
  },
};
</script>

<style>

</style>

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
            <div class="form-group mt-3" >
              <label for="price">Harga (Rp)</label>
              <input 
                id="price"
                name="price"
                type="number"
                min=0
                step="1" 
                required
                class="form-control"
                v-model="form.price"
              />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="inputPrice()">Simpan</button>
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
      try {
        let response = await axios.post(
          `/order/${this.order.id}/updatePrice`,
          this.form,
        );
        return location.reload();
      } catch (error) {
        console.log(error.response);
      }
    },
  },
  data() {
    return {
      form: {
        price: null,
      }
    }
  },
};
</script>

<style>

</style>

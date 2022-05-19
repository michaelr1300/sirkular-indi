<template>
  <div>
    <button
      data-bs-toggle="modal" 
      :data-bs-target="'#input-receipt-modal-' + order.id"
      class="btn btn-primary"
    >
      Masukkan Nomor Resi
    </button>
    <div class="modal fade" :id="'input-receipt-modal-' + order.id" tabindex="-1" :aria-labelledby="'input-receipt-modal-' + order.id" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Masukkan Nomor Resi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3" >
              <label for="receipt">Review</label>
              <input 
                id="receipt"
                name="receipt"
                type="text" 
                required
                class="form-control"
                v-model="form.receipt"
              />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="inputReceipt()">Simpan</button>
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
    async inputReceipt() {
      try {
        let response = await axios.post(
          `/order/${this.order.id}/updateReceipt`,
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
        receipt: null,
      }
    }
  },
};
</script>

<style>

</style>

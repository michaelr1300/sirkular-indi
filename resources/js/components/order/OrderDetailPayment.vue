<template>
  <div>
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="'#payment-proof-modal-' + id">
      Lihat Bukti Bayar
    </button>
    <div class="modal fade" :id="'payment-proof-modal-' + id" tabindex="-1" :aria-labelledby="'payment-proof-modal-'" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Bukti Bayar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img
              class="img img-fluid"
              :src="'/storage/' + photoPath"
              alt="payment-proof"
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    id: {
      type: Number,
      default: null
    },
    photoPath: {
      type: String,
      default: ''
    },
  },
};
</script>

<style>

</style>

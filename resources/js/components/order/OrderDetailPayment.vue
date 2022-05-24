<template>
  <div>
    <button 
      v-if="order.payment_photo.length"
      type="button" 
      class="btn btn-primary" 
      data-bs-toggle="modal" 
      :data-bs-target="'#payment-proof-modal-' + order.id"
    >
      Lihat Bukti Bayar
    </button>
    <button
      v-else-if="order.price"
      class="btn btn-primary me-3"
      disabled
    >
      Lihat Bukti Bayar
    </button>
    <div class="modal fade" :id="'payment-proof-modal-' + order.id" tabindex="-1" :aria-labelledby="'payment-proof-modal-' + order.id" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Bukti Bayar</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img
              class="img img-fluid"
              style="max-width: 100%"
              :src="order.payment_photo[0].url"
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
    order: {
      type: Object,
    },
  },
};
</script>

<style>

</style>

<template>
  <div>
    <h3 class="mb-3">Detail Pesanan</h3>
    <button  
      v-if="order.status !== 'finish' && user.is_admin"
      class="btn btn-primary"
      @click="updateStatus()"
    >
      {{ nextStatus }} Pesanan
    </button>
    <div
      id="payment"
      v-if="!order.payment_photo"
    >
      <div class="mb-3">
        <label for="payment_photo" class="form-label">Upload Bukti Bayar</label>
        <input 
          id="payment_photo" 
          name="payment_photo"
          ref="payment_photo"
          accept="image/*"
          class="form-control" 
          type="file" 
        >
      </div>
      <button  
        class="btn btn-primary"
        @click="uploadPayment()"
      >
        Upload Bukti Bayar
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      default: null
    },
    order: {
      type: Object,
      default: null
    },
  },
  computed: {
    nextStatus() {
      if (this.order.status == 'waiting') {
          return 'Konfirmasi';
      }
      if (this.order.status == 'confirm') {
          return 'Proses';
      }
      if (this.order.status == 'process') {
          return 'Selesaikan';
      }
    }
  },
  methods: {
    async updateStatus() {
      try {
        let response = await axios.post(`/order/${this.order.id}/updateStatus`);
        return location.reload();
      } catch (error) {
        console.log(error.response);
      }
    },
    async uploadPayment() {
      var payment_photo = this.$refs.payment_photo.files[0];
      let formData = new FormData();
      formData.append("payment_photo", payment_photo);
      try {
        let response = await axios.post(
          `/order/${this.order.id}/updatePayment`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        alert("Bukti Transfer Terupload");
      } catch (error) {
        console.log(error.response);
      }
    }
  },
};
</script>

<style>

</style>

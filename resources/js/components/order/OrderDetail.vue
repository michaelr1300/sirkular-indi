<template>
  <div>
    <div class="mb-3">
      <h3>Informasi Pesanan</h3>
      <table class="table-text">
        <tbody>
          <tr style="height:2rem">
            <td class="font-weight-bold text-nowrap">Nama</td>
            <td>:</td>
            <td class="w-100 text-nowrap">{{ order.buyer_name }}</td>
          </tr>
          <tr style="height:2rem">
            <td class="font-weight-bold text-nowrap">Alamat</td>
            <td>:</td>
            <td class="w-100 text-nowrap">{{ order.buyer_address }}</td>
          </tr>
          <tr style="height:2rem">
            <td class="font-weight-bold text-nowrap">Nomor Telepon</td>
            <td>:</td>
            <td class="w-100 text-nowrap">{{ order.buyer_phone_number }}</td>
          </tr>
          <tr/>
          <tr style="height:2rem">
            <td class="font-weight-bold text-nowrap">Status</td>
            <td>:</td>
            <td class="w-100 text-nowrap">{{ order.status }}</td>
          </tr>
        </tbody>
      </table>
      <h5>Bukti Bayar</h5>
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
      <div v-if="order.payment_photo">
        <img :src="'/storage/' + order.payment_photo" alt="payment-proof" style="max-width:200px">
      </div>
    </div>
    <h3 class="mb-3">Daftar Pesanan</h3>
    <table class="table table-striped">
      <tbody>
        <tr style="height:2rem">
          <td>item 1</td>
          <td>1 biji</td>
          <td>harga</td>
          <td>deskripsi</td>
        </tr>
        <tr style="height:2rem">
          <td class="font-weight-bold text-nowrap">item 2</td>
          <td>1 biji</td>
          <td class="w-100 text-nowrap">harga</td>
          <td class="w-100 text-nowrap">deskripsi</td>
        </tr>
        <tr style="height:2rem">
          <td class="font-weight-bold text-nowrap">item 3</td>
          <td>1 biji</td>
          <td class="w-100 text-nowrap">harga</td>
          <td class="w-100 text-nowrap">deskripsi</td>
        </tr>
      </tbody>
    </table>
    <button  
      v-if="order.status !== 'finish' && user.is_admin"
      class="btn btn-primary"
      @click="updateStatus()"
    >
      {{ nextStatus }} Pesanan
    </button>
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

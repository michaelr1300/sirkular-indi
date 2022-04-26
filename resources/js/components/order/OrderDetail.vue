<template>
  <div class="card mb-3">
    <h2
      class="accordion-header"
    >
      <button
        class="accordion-button collapsed px-2 px-md-3"
        type="button"
        data-bs-toggle="collapse"
        :data-bs-target="'#order-'+order.id"
      >
        <div class="col-4">
          <b>{{ order.buyer_name }}</b>
        </div>
        <div class="col-4">
          <order-status-badge :status="order.status" />
        </div>
        <div class="col-3">
          Rp {{ totalPrice }}
        </div>
      </button>
    </h2>
    <div
      :id="'order-'+order.id"
      class="accordion-collapse collapse"
    >
      <div class="accordion-body px-2 px-md-3">
        <div
          v-if="!order.payment_photo"
          class="mb-3 text-center"
        >
          <div>
            Anda belum mengirimkan bukti pembayaran untuk transaksi ini.
            <br>
            Silakan lakukan pembayaran ke rekening
          </div>
          <div class="my-1">
            <div class="img img-fluid">
              <img
                class="img-bca"
                src="images/bca.png"
                alt="bca account"
              >
            </div>
            <div class="mt-2">
              <div><b>103 949 4950</b></div>
              <div>an. PT. indigo Indonesia</div>
            </div>
          </div>
          <div class="d-flex mt-2">
            <label
              class="btn btn-primary w-50 mx-auto"
            >
              <input
                id="payment_photo"
                ref="payment_photo"
                name="payment_photo"
                accept="image/*"
                class="form-control"
                style="display: none"
                type="file"
                @change="uploadPayment()"
              >
              Upload Bukti Bayar
            </label>
          </div>
          <hr>
        </div>
        <div class="d-md-flex flex-row-reverse">
          <div class="col-12 col-md-6">
            <div class="d-flex justify-content-between justify-content-md-end">
              <order-detail-payment
                v-if="order.payment_photo"
                :id="order.id"
                :photo-path="order.payment_photo"
                class="me-3"
              />
              <button
                v-else
                class="btn btn-primary me-3"
                disabled
              >
                Lihat Bukti Bayar
              </button>
              <button
                v-if="order.status !== 'finish' && user.is_admin"
                class="btn btn-primary"
                @click="updateStatus()"
              >
                {{ nextStatus }} Pesanan
              </button>
            </div>
          </div>
          <hr class="d-block d-sm-none">
          <div class="col-12 col-md-6 mb-3 table-responsive">
            <table class="table-text">
              <tbody>
                <tr style="height:2rem">
                  <td class="font-weight-bold text-nowrap">
                    Nama
                  </td>
                  <td>
                    <div class="mx-2">
                      :
                    </div>
                  </td>
                  <td class="w-100 text-nowrap">
                    {{ order.buyer_name }}
                  </td>
                </tr>
                <tr style="height:2rem">
                  <td class="font-weight-bold text-nowrap">
                    Nomor Telepon
                  </td>
                  <td>
                    <div class="mx-2">
                      :
                    </div>
                  </td>
                  <td class="w-100 text-nowrap">
                    {{ order.buyer_phone_number }}
                  </td>
                </tr>
                <tr style="height:2rem">
                  <td class="font-weight-bold text-nowrap">
                    Alamat
                  </td>
                  <td>
                    <div class="mx-2">
                      :
                    </div>
                  </td>
                  <td class="w-100 text-nowrap">
                    {{ order.buyer_address }}
                  </td>
                </tr>
                <tr />
              </tbody>
            </table>
          </div>
        </div>
        <h3 class="text-header mt-3 mb-2">
          Detail Produk
        </h3>
        <table class="table table-striped">
          <thead style="font-size: 18px">
            <tr>
              <th scope="col">
                Produk
              </th>
              <th scope="col">
                Harga
              </th>
              <th scope="col">
                Jumlah
              </th>
              <th scope="col">
                Total
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item, index) in order.items"
              :key="index"
              style="height:2rem"
            >
              <td>
                <div style="font-size: 16px">
                  <b>{{ item.package_name }}</b>
                </div>
                <div>
                  {{ item.description }}
                </div>
              </td>
              <td>Rp {{ item.price }}</td>
              <td>{{ item.quantity }}</td>
              <td>Rp {{ item.price * item.quantity }}</td>
            </tr>
            <tr>
              <td
                colspan="3"
                class="text-end font-weight-bold"
              >
                Total
              </td>
              <td class="font-weight-bold">
                Rp {{ totalPrice }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import OrderDetailPayment from './OrderDetailPayment.vue';
import OrderStatusBadge from './OrderStatusBadge.vue';

export default {
  components: { OrderStatusBadge, OrderDetailPayment },
  props: {
    user: {
      type: Object,
      default: null,
    },
    order: {
      type: Object,
      default: null,
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
    },
    totalPrice() {
      let totalPrice = 0;
      this.order.items.forEach((item) => totalPrice += item.price * item.quantity);
      return totalPrice;
    },
  },
  methods: {
    async updateStatus() {
      try {
        const response = await axios.post(`/order/${this.order.id}/updateStatus`);
        return location.reload();
      } catch (error) {
        console.log(error.response);
      }
    },
    async uploadPayment() {
      const payment_photo = this.$refs.payment_photo.files[0];
      const formData = new FormData();
      formData.append('payment_photo', payment_photo);
      try {
        const response = await axios.post(
          `/order/${this.order.id}/updatePayment`,
          formData,
          {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          },
        );
        alert('Bukti Transfer Terupload');
      } catch (error) {
        console.log(error.response);
      }
    },
    showPayment(photoPath) {

    },
  },
};
</script>

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
          <br>
          <div>{{ orderDate }}</div>
        </div>
        <div class="col-4">
          <order-status-badge :status="order.status" />
        </div>
        <div v-if="order.price" class="col-3">
          Rp {{ order.price }}
        </div>
      </button>
    </h2>
    <div
      :id="'order-'+order.id"
      class="accordion-collapse collapse"
    >
      <div class="accordion-body px-2 px-md-3">
        <div
          v-if="!order.payment_photo.length && order.price"
          class="mb-3 text-center"
        >
          <div>
            Anda belum mengirimkan bukti pembayaran untuk transaksi ini.
            <br>
            Silahkan melakukan pembayaran sebesar
            <h2 class="package-price" style="font-size: 24px !important">Rp {{ order.price }}</h2>
          </div>
          <div class="my-1">
            <div class="img img-fluid">
              <img
                class="img-bca"
                src="/images/bca.png"
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
              <OrderDetailPayment
                :order="order"
                class="me-3"
              />
              <OrderDetailInputPrice 
                v-if="!order.price && user.is_admin" 
                :order="order"
              />
              <OrderDetailInputReceipt
                v-if="order.status == 'finish' && user.is_admin && !order.receipt_number" 
                :order="order"
              />
              <button
                v-if="order.price && order.status !== 'finish' && user.is_admin"
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
                <tr v-if="order.receipt_number" style="height:2rem">
                  <td class="font-weight-bold text-nowrap">
                    <b>Nomor Resi</b>
                  </td>
                  <td>
                    <div class="mx-2">
                      <b>:</b>
                    </div>
                  </td>
                  <td class="w-100 text-nowrap">
                    <b>{{ order.receipt_number }}</b>
                  </td>
                </tr>
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
                <tr style="height:2rem; vertical-align: text-top;">
                  <td class="font-weight-bold text-nowrap">
                    Alamat
                  </td>
                  <td>
                    <div class="mx-2">
                      :
                    </div>
                  </td>
                  <td style="vertical-align: text-top;" class="w-100 text-area">{{ order.buyer_address }}</td>
                </tr>
                <tr />
              </tbody>
            </table>
          </div>
        </div>
        <h3 class="text-header mt-3 mb-2">
          Detail Pesanan
        </h3>
        <table class="table table-striped">
          <thead style="font-size: 18px">
            <tr>
              <th scope="col">
                Layanan
              </th>
              <th scope="col">
                Keterangan
              </th>
              <th scope="col">
                Foto
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(item, index) in order.items"
              :key="index"
              style="height:2rem"
            >
              <td>{{ getPackageName(item.package_id) }}</td>
              <td>{{ item.description }}</td>
              <td>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#preview-image-modal" 
                  @click="$emit('select-order', item);">
                  Lihat Foto
                </button>
              </td>
            </tr>
            <tr v-if="order.price">
              <td
                colspan="2"
                class="text-end font-weight-bold"
              >
                <b>Total</b>
              </td>
              <td class="font-weight-bold">
                <b>Rp {{ order.price }}</b>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { format } from 'date-fns'
import OrderDetailPayment from './OrderDetailPayment.vue';
import OrderStatusBadge from './OrderStatusBadge.vue';
import OrderListImagePreviewModal from './OrderListImagePreviewModal.vue';
import OrderDetailInputPrice from './OrderDetailInputPrice.vue';
import OrderDetailInputReceipt from './OrderDetailInputReceipt.vue';

export default {
  components: { OrderStatusBadge, OrderDetailPayment, OrderListImagePreviewModal, OrderDetailInputPrice, OrderDetailInputReceipt },
  props: {
    user: {
      type: Object,
      default: null,
    },
    order: {
      type: Object,
      default: null,
    },
    packages: {
      type: Array,
    }
  },
  data() {
    return {
      form: {
        receipt: null,
        price: null,
      },
      selectedOrder: {},
    }
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
    orderDate() {
      return format(new Date(this.order.created_at), 'dd MMM yyyy')
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
        return location.reload()
      } catch (error) {
        alert('Gagal Upload Bukti Transfer! Pastikan file yang dipilih adalah file gambar!');
        console.log(error.response);
      }
    },
    getPackageName(id) {
      const result = this.packages.filter((item) => item.id == id);
      return result[0]?.name || '';
    }
  },
};
</script>

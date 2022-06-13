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
          v-if="!order.payment_photo.length && totalPrice && order.user_id == user.id"
          class="mb-3 text-center"
        >
          <div>
            Anda belum mengirimkan bukti pembayaran untuk transaksi ini.
            <br>
            Silahkan melakukan pembayaran sebesar
            <h2 class="package-price" style="font-size: 24px !important">Rp {{ totalPrice }}</h2>
          </div>
          <div class="my-1">
            <div class="img img-fluid">
              <img
                class="img-mandiri"
                src="/images/mandiri.png"
                alt="mandiri logo"
              >
            </div>
            <div class="mt-2">
              <div><b>137.000.988.140.6</b></div>
              <div>an. Edia Rahayuningsih</div>
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
        <div
          v-if="order.price && order.status == 'waiting'"
          class="mb-3 text-center"
        >
          <div>
            Silakan kirimkan pakaian Anda setelah melakukan pembayaran ke alamat
            <div>
              <b>
                <span style="font-size: 20px">Indi Sirkular</span>
                <br>
                Jl. Pandega Marta 1 No. 6
                <br>
                Caturtunggal, Depok, Sleman
                <br>
                D.I. Yogyakarta 55281
              </b>
            </div>
          </div>
          <hr>
        </div>
        <div class="d-md-flex flex-row-reverse">
          <div class="col-12 col-md-6">
            <div class="d-flex justify-content-end">
              <!-- <OrderDetailInputPrice 
                v-if="!order.price && user.is_admin" 
                :order="order"
              /> -->
              <OrderDetailInputReceipt
                v-if="order.status == 'finish' && user.is_admin && !order.receipt_number" 
                :order="order"
              />
              <button
                v-if="order.price && order.status !== 'finish' && user.is_admin"
                data-bs-toggle="modal" 
                data-bs-target="#update-order-modal" 
                class="btn btn-primary"
                @click="$emit('select-order', order);"
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
                <tr style="height:2rem;">
                  <td class="font-weight-bold text-nowrap">
                    Bukti Bayar
                  </td>
                  <td>
                    <div class="mx-2">
                      :
                    </div>
                  </td>
                  <td>      
                    <OrderDetailPayment
                      :order="order"
                      class="me-3"
                    />
                  </td>
                </tr>
                <tr />
              </tbody>
            </table>
          </div>
        </div>
        <div class="d-flex justify-content-between mt-3 mb-2">
          <h4 class="text-header my-auto">
            Detail Pesanan
          </h4>
          <div>
            <button
              v-show="!isEditPrice && user.is_admin"
              class="btn btn-primary"
              @click="isEditPrice = true"
            >
              Ubah Harga
            </button>
            <div v-if="isEditPrice && user.is_admin">
              <button
                class="btn btn-success me-2"
                @click="updatePrice()"
                :disabled="isLoading"
              >
                {{ isLoading ? 'Menyimpan' : 'Simpan' }}
              </button> 
              <button
                class="btn btn-outline-primary"
                @click="resetEdit()"
                :disabled="isLoading"
              >
                Batal
              </button>
            </div>
          </div>
        </div>
        <table style="table-layout: fixed;" class="table table-borderless table-responsive d-md-table">
          <thead style="border-bottom: 1px solid #c4c4c4;">
             <tr>
              <th scope="col">Layanan</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Foto</th>
              <th scope="col">Harga</th>
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
                  @click="$emit('select-order-item', item);">
                  Lihat Foto
                </button>
              </td>
              <td>
                <span v-if="!isEditPrice">
                  Rp {{ item.price }}
                </span>
                <input
                  v-else
                  type="number"
                  min="0"
                  class="form-control"
                  :class="{ 'is-invalid': priceError[index] }"
                  v-model="form.itemPrice[index]"
                  @input="priceError[index] = false"
                />
                <div v-if="priceError[index]" class="text-danger">
                  Harga tidak valid!
                </div>
              </td>
            </tr>
            <tr>
              <td
                colspan="3"
                class="text-end font-weight-bold"
                style="vertical-align: middle;"
              >
                <b>Ongkos kirim</b>
              </td>
              <td>
                <span v-if="!isEditPrice">
                  <b>Rp {{ order.delivery_fee }}</b>
                </span>
                <input
                  v-else
                  type="number"
                  min="0"
                  class="form-control"
                  v-model="form.delivery_fee"
                  :class="{ 'is-invalid': hasErrors('delivery_fee') }"
                  @input="errors['delivery_fee'] = ''"
                />
              </td>
            </tr>
            <tr v-if="hasErrors('delivery_fee')">
              <td colspan="3"/>
              <td class="text-danger pt-0">
                Ongkos kirim tidak valid!
              </td>
            </tr>
            <tr v-if="totalPrice">
              <td
                colspan="3"
                class="text-end font-weight-bold"
              >
                <b>Total</b>
              </td>
              <td class="font-weight-bold">
                <b>Rp {{ totalPrice }}</b>
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
      isEditPrice: false,
      isLoading: false,
      form: {
        receipt: null,
        delivery_fee: this.order.delivery_fee,
        itemPrice: this.order.items.map((item) => item.price ?? 0),
      },
      priceError : [],
      errors : {},
      selectedOrder: {},
    }
  },
  computed: {
    nextStatus() {
      if (this.order.status == 'waiting') {
        return 'Terima';
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
      let totalPrice = this.order.delivery_fee;
      this.order.items.forEach((item) => totalPrice += item.price);
      return totalPrice;
    },
  },
  methods: {
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
    async updatePrice() {
      this.isLoading = true;
      this.form.itemPrice.forEach(
        (item, index) => {
          if(item == '' || item < 0) {
            this.priceError[index] = true
          } else {
            this.priceError[index] = false
          }
        }
      )
      const invalidItems = this.priceError.filter((item) => item == true)
      if (invalidItems.length > 0) {
        this.isLoading = false;     
        return;
      }

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
    resetEdit() {
      this.isEditPrice = false;
      this.form.delivery_fee = this.order.delivery_fee;
      this.form.itemPrice = this.order.items.map((item) => item.price ?? 0);
    },
    getPackageName(id) {
      const result = this.packages.filter((item) => item.id == id);
      return result[0]?.name || '';
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

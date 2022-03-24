<template>
  <div>
    <h3 class="mb-3">Buat Pesanan</h3>
    <ul
      id="order-tab"
      class="nav nav-tabs"
      role="tablist"
    >
      <li
        class="nav-item"
        role="presentation"
      >
        <button
          id="personal-info-tab"
          class="nav-link active"
          data-bs-toggle="tab"
          data-bs-target="#personal-info"
          type="button"
          role="tab"
          aria-controls="personal-info"
          aria-selected="true"
        >
          Data Diri
        </button>
      </li>
      <li
        class="nav-item"
        role="presentation"
      >
        <button
          id="order-detail-tab"
          class="nav-link"
          data-bs-toggle="tab"
          data-bs-target="#order-detail"
          type="button"
          role="tab"
          aria-controls="order-detail"
          aria-selected="false"
        >
          Data Pesanan
        </button>
      </li>
      <li
        class="nav-item"
        role="presentation"
      >
        <button
          id="payment-tab"
          class="nav-link"
          data-bs-toggle="tab"
          data-bs-target="#payment"
          type="button"
          role="tab"
          aria-controls="payment"
          aria-selected="false"
        >
          Pembayaran
        </button>
      </li>
    </ul>
    <div
      class="tab-content"
    >
      <div
        id="personal-info"
        class="tab-pane fade show active"
        role="tabpanel"
        aria-labelledby="personal-info-tab"
      >
      <div class="row">
        <div class="col-12 col-md-6 mb-3">
          <label for="name" class="form-label">Nama</label>
          <input 
            id="name" 
            name="name" 
            type="text" 
            class="form-control" 
            placeholder="Nama Anda"
            v-model="form.name"
          >
        </div>
        <div class="col-12 col-md-6 mb-3">
          <label for="phone_number" class="form-label">Nomor WhatsApp</label>
          <input 
            id="phone_number" 
            name="phone_number" 
            type="text" 
            class="form-control" 
            placeholder="Nomor WhatsApp"
            v-model="form.phone_number"
          >
        </div>
        <div class="col-12 mb-3">
          <label for="address" class="form-label">Alamat</label>
          <input 
            id="address" 
            name="address" 
            type="text" 
            class="form-control" 
            placeholder="Alamat Anda"
            v-model="form.address"
          >
          <small>*lengkap dengan kecamatan, kabupaten, dan provinsi Anda</small>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input 
              id="flexCheckChecked" 
              class="form-check-input" 
              type="checkbox" 
              v-model="form.save_data"
              :checked="form.save_data">
            <label class="form-check-label" for="flexCheckChecked">
              Simpan data saya
            </label>
          </div>
        </div>
      </div>
      </div>
      <div
        id="order-detail"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="order-detail-tab"
      >
        <div
          v-for="(item, index) in packageList"
          :key="item.id"
          class="col mb-3"
        >
          <label :for="'package-' + item.id" class="form-label">{{ item.name }}</label>
          <input 
            :id="'package-' + item.id" 
            name="quantity" 
            type="number" 
            min="0"
            class="form-control" 
            v-model="form.quantity[index]"
          >
        </div>
        <button  
          class="btn btn-primary"
          @click="doSubmit()"
        >
          Submit
        </button>
      </div>
      <div
        id="payment"
        class="tab-pane fade"
        role="tabpanel"
        aria-labelledby="payment-tab"
      >
        ...
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    packageList: {
      type: Array,
      default: null
    },
    user: {
      type: Object,
      default: null
    },
  },
  mounted () {
    this.form.name = this.user.name;
    this.form.phone_number = this.user.phone_number;
    this.form.address = this.user.address;
    this.form.package_id = this.packageList.map(val => val.id);
    this.form.quantity = this.packageList.map(val => 0);
  },
  data() {
    return {
      form: {
        name: null,
        phone_number: null,
        address: null,
        save_data: true,
        package_id: [],
        quantity: [],
      }
    }
  },
  methods: {
    async doSubmit() {
      try {
        let response = await axios.post("/order", this.form);
        alert("Order Created");
      } catch (error) {
        console.log(error.response);
      }
    }
  },
};
</script>

<style>

</style>

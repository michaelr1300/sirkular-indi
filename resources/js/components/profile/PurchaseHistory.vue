<template>
  <div class="d-md-flex flex-row justify-content-center" style="min-height: 100vh">
    <div class="d-none d-md-block col-md-3 profile-side" style="height: inherit">
      <div class="mt-4">
        <h1 class="text-uppercase ms-5" style="font-size: 3.8vw; font-weight: 900;">Riwayat</h1>
        <h1 class="text-uppercase ms-5" style="font-size: 3vw; font-weight: 900;">Transaksi</h1>
      </div>
    </div>
    <div class="col-12 col-md-9">
      <div class="mt-4 me-4">
        <h1 class="text-uppercase font-weight-bold ps-4">Daftar Pesanan</h1>
        <order-list :orders="orders" :user="user"></order-list>
      </div>
    </div>
  </div>
</template>

<script>
import OrderList from '../order/OrderList.vue';
export default {
  components: { OrderList },
  props: {
    user: {
      type: Object,
      default: null, 
    },
    orders: {
      type: Array,
      default: null, 
    },
  },
  data() {
    return {
      isEdit: false,
      isUpdatePassword: false,
      form: {...this.user},
      isLoading: false,
      errors: {}
    }
  },
  methods: {
    async doUpdate() {
        this.isLoading = true;
        try {
            var url = "/profile/update";
            let response = await axios.put(url, this.form);
            return location.reload();
        } catch (error) {
            console.log(error.response);
            this.errors = error.response.data.errors;
        }
        this.isLoading = false;
    },
    
    async doUpdatePassword() {
        this.isLoading = true;

        try {
            var url = "/profile/update-password";
            let response = await axios.put(url, this.form);
            return location.reload();
        } catch (error) {
            alert(error.response.data.message);
            console.log(error.response);
            this.errors = error.response.data.errors;
        }
        this.isLoading = false;
    },

    doResetEdit() {
        this.form = {...this.user}
        this.isEdit = false;
        this.isLoading = false;
    },

    doResetUpdatePassword() {
        this.form = {...this.user}
        this.isUpdatePassword = false;
        this.isLoading = false;
    },

    hasErrors(key) {
      if (this.errors[key]) {
        return true;
      }
      return false;
    },
    getErrors(key) {
      if (this.hasErrors(key)) {
        return this.errors[key].join(", ");
      }
      return "";
    },
  },
};
</script>

<style scoped>
.profile-side{
    font-family: 'Mulish', sans-serif;
    color: #142362;
    background-image: url("../../../assets/background-catalog.png");
    background-size: contain;
    box-shadow:inset 0 0 0 2000px rgba(255, 255, 255, 0.95);
}
</style>

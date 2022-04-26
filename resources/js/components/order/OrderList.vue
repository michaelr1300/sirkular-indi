<template>
  <div class="px-4">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th scope="col">Nama Pembeli</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Status</th>
          <th scope="col">Bukti Transfer</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <template v-for="item in orders">
          <tr
            data-bs-toggle="collapse" 
            :data-bs-target="'#order-'+item.id"
            :key="item.id"
            style="border-bottom-style: hidden;"
          >
            <td>{{ item.buyer_name }}</td>
            <td>{{ item.total }}</td>
            <td>{{ item.status }}</td>
            <td>{{ item.receipt }}</td>
            <td><font-awesome-icon class="icon-footer" icon="fab fa-chevron-down"/></td>
          </tr>
          <tr :key="'detail-'+item.id">
            <td colspan="5" class="py-0">
              <div 
                class="accordian-body collapse" 
                :id="'order-'+item.id"
              >
                <order-detail :order="item" :user="user"></order-detail>
              </div> 
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</template>

<script>
import OrderDetail from './OrderDetail.vue';
export default {
  components: { OrderDetail },
  props: {
    user: {
      type: Object,
      default: null, 
    },
    orders: {
      type: Array,
      default: null
    },
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

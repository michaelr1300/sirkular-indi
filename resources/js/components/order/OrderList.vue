<template>
  <div>
    <h3 class="mb-3">List Pesanan</h3>
    <table class="table table-responsive table-striped">
      <thead>
        <tr>
          <th scope="col">Nama Pembeli</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Status</th>
          <th scope="col">Bukti Transfer</th>
          <th scope="col">Detail</th>
        </tr>
      </thead>
      <tbody>
        <tr 
          v-for="(item) in orders"
          :key="item.id"
          class="col mb-3"
        >
          <td>{{ item.user_id }}</td>
          <td>Total</td>
          <td>{{ item.status }}</td>
          <td>{{ item.receipt }}</td>
          <td>
            <button class="btn btn-primary">Detail</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: {
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

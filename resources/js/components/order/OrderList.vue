<template>
  <div>
    <div>
      <order-list-image-preview-modal :selectedItem="selectedOrderItem"/>
      <order-list-update-modal :selectedItem="selectedOrder"/>
      <order-detail 
        v-for="item in orders"
        :key="item.id"
        :order="item"
        :user="user"
        :packages="packages"
        @select-order="updateSelectedOrder"
        @select-order-item="updateSelectedItem"
      />
    </div>
  </div>
</template>

<script>
import OrderDetail from './OrderDetail.vue';

export default {
  components: { OrderDetail },
  props: {
    user: {
      type: Object,
    },
    orders: {
      type: Array,
    },
  },
  data() {
    return {
      packages: [],
      selectedOrder: {},
      selectedOrderItem: {}
    }
  },
  mounted () {
    this.getPackageList();
  },
  methods: {
    async getPackageList() {
      try {
        let response = await axios.get(`/api/getAllPackages`);
        this.packages = response.data;
      } catch (error) {
        console.log(error.response);
      }
    },
    async updateSelectedItem(item) {
      try {
        let response = await axios.get('/api/getOrderImage/' + item.id);
        const photo = response.data;
        this.selectedOrderItem = { ...item, photo: photo};
      } catch (error) {
        console.log(error.response);
      } 
    },
    updateSelectedOrder(item) {
      this.selectedOrder = item;
    }
  },
};
</script>

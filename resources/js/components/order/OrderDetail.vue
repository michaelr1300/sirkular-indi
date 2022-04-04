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
    }
  },
};
</script>

<style>

</style>

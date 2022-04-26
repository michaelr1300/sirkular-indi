<template>
  <div>
    <div class="accordion">
      <order-detail 
        v-for="item in orders"
        :key="item.id"
        :order="item"
        :user="user"
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
      default: null,
    },
    orders: {
      type: Array,
      default: null,
    },
  },
};
</script>

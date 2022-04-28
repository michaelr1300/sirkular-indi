<template>
  <div>
    <div>
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
    },
    orders: {
      type: Array,
    },
  },
};
</script>

<template>
  <div>
    <div class="d-flex justify-content-between mb-3">
      <h3 class="text-header px-3">Order Management</h3> 
    </div>
    <order-list :orders='orders' :user='user'></order-list>
  </div>
</template>

<script>
export default {
  props: {
    orders: {
      type: Array,
      default: null
    },
    user: {
      type: Object,
      default: null
    }
  },
};
</script>
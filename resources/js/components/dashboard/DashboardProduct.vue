<template>
  <div>
    <div class="d-md-flex justify-content-between mb-3">
      <h3 class="text-header">Product Management</h3> 
      <DashboardProductFormAdd/>
    </div>
    <div class="d-flex row">
      <div 
        v-for="item in packages" :key="item.id" 
        class="col-12 col-md-4 px-2 my-2"
      >
        <div class="card rounded h-100">
          <div class="card-body d-flex flex-column justify-content-between">
            <div class="d-flex justify-content-between mb-2 w-100">
              <h4 class="my-auto"><b>{{ item.name }}</b></h4>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-product-modal" 
                @click="editProduct(item)">
                <span class="mdi mdi-pencil"></span>
              </button>
            </div>
            <div class="product-price mb-3">Rp {{ item.price }}</div>
            <p class="text-area">{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
    <DashboardProductFormEdit :selectedProduct="selectedProduct"></DashboardProductFormEdit>
  </div>
</template>

<script>
import DashboardProductFormAdd from './DashboardProductFormAdd.vue';
import DashboardProductFormEdit from './DashboardProductFormEdit.vue';
export default {
  components: { DashboardProductFormEdit, DashboardProductFormAdd },
  props: {
    packages: {
      type: Array,
      default: null
    },
  },
  data() {
    return {
      selectedProduct : {},
    }
  },
  methods: {
    editProduct(item) {
      this.selectedProduct = item;
    },
  },
};
</script>

<style>

</style>

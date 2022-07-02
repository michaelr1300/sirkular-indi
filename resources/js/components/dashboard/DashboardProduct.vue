<template>
  <div>
    <div class="d-md-flex justify-content-between mb-3">
      <h3 class="text-header px-3">Product Management</h3> 
      <DashboardProductFormAdd class="px-3"/>
    </div>
    <div class="row mx-0">
      <div 
        v-for="item in products" :key="item.id" 
        class="col-12 col-md-4 px-2 my-2"
      >
        <div class="card rounded h-100">
          <div class="card-body d-flex flex-column">
            <div class="mb-2 w-100">
              <div class="d-flex justify-content-between ">
                <h4 class="my-auto"><b>{{ item.name }}</b></h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-product-modal" 
                  @click="editProduct(item)">
                  <span class="mdi mdi-pencil"></span>
                </button>
              </div>
              <div 
                class="d-flex flex-column my-3"
              >
                <img 
                  v-if="item.media[0]" 
                  class="img img-fluid" 
                  :src="item.photo_path[0].url" 
                  alt="product-image"
                  style="max-height: 300px; max-width: 300px; object-fit: contain;"
                >
                <img
                  v-else
                  class="my-auto w-100 h-100"
                  style="max-height: 300px; object-fit: cover;"
                  src="/images/default-placeholder.png"
                  alt="product image"
                >
              </div>
            </div>
            <div class="package-price mb-3">Rp {{ item.price }}</div>
            <p class="text-area">{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
    <DashboardProductFormEdit :selectedProduct="selectedProduct"></DashboardProductFormEdit>
    <DeleteModal :url="'/dashboard/product/'" :item="selectedProduct" :type="'produk ' + selectedProduct.name"/>
  </div>
</template>

<script>
import DashboardProductFormAdd from './DashboardProductFormAdd.vue';
import DashboardProductFormEdit from './DashboardProductFormEdit.vue';
export default {
  components: { DashboardProductFormEdit, DashboardProductFormAdd },
  props: {
    products: {
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

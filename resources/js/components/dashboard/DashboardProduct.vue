<template>
  <div>
    <div class="d-flex justify-content-between mb-3">
      <h3>Product Management</h3> 
      <DashboardProductFormAdd/>
    </div>
    <div class="d-flex row">
      <div 
        v-for="item in packages" :key="item.id" 
        class="col-12 col-md-4 px-2 my-2"
      >
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-4 w-100">
              <h4 class="my-auto"><b>{{ item.name }}</b></h4>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-product-modal" 
                @click="editProduct(item)">
                <span class="mdi mdi-pencil"></span>
              </button>
            </div>
            <p>{{ item.description }}</p>
            <div>Rp {{ item.price }}</div>
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

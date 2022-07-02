<template>
  <div>
    <div class="d-md-flex justify-content-between mb-3">
      <h3 class="text-header px-3">Package Management</h3>
    </div>
    <div class="row mx-0">
      <div 
        v-for="item in packages" :key="item.id" 
        class="col-12 col-md-4 px-2 my-2"
      >
        <div class="card rounded h-100">
          <div class="card-body d-flex flex-column">
            <div class="mb-2 w-100">
              <div class="d-flex justify-content-between ">
                <h4 class="my-auto"><b>{{ item.name }}</b></h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-package-modal" 
                  @click="editPackage(item)">
                  <span class="mdi mdi-pencil"></span>
                </button>
              </div>
              <div 
                v-if="item.media[0]" 
                class="d-flex flex-column my-3"
              >
                <img 
                  class="img img-fluid" 
                  :src="item.photo_path[0].url" 
                  alt="review-image"
                  style="max-height: 400px; max-width: 400px; object-fit: contain;"
                >
              </div>
            </div>
            <div class="package-price mb-3">Rp {{ item.min_price }} - {{ item.max_price }}</div>
            <p class="text-area">{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
    <DashboardPackageFormEdit :selectedPackage="selectedPackage"></DashboardPackageFormEdit>
  </div>
</template>

<script>
import DashboardPackageFormEdit from './DashboardPackageFormEdit.vue';
export default {
  components: { DashboardPackageFormEdit },
  props: {
    packages: {
      type: Array,
      default: null
    },
  },
  data() {
    return {
      selectedPackage : {},
    }
  },
  methods: {
    editPackage(item) {
      this.selectedPackage = item;
    },
  },
};
</script>

<style>

</style>

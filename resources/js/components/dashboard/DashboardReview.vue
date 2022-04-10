<template>
  <div>
    <div class="d-flex justify-content-between mb-3">
      <h3>Review Management</h3> 
      <DashboardReviewFormAdd/>
    </div>
    <div class="d-flex row">
      <div 
        v-for="item in reviews" :key="item.id" 
        class="col-12 col-md-4 px-2 my-2"
      >
        <div class="card rounded h-100">
          <div class="d-flex flex-column card-body w-100 justify-content-between">
            <div class="text-end mb-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-review-modal" 
                @click="editReview(item)">
                <span class="mdi mdi-pencil"></span>
              </button>
              <img 
                v-if="item.photo_path" 
                class="img img-fluid my-3" 
                :src="'/storage/' + item.photo_path" 
                alt="review-image"
              >
            </div>
            <div>
              <hr>
              <p>{{ item.content }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <DashboardReviewFormEdit :selectedReview="selectedReview"></DashboardReviewFormEdit>
  </div>
</template>

<script>
import DashboardReviewFormAdd from './DashboardReviewFormAdd.vue';
import DashboardReviewFormEdit from './DashboardReviewFormEdit.vue';
export default {
  components: { DashboardReviewFormEdit, DashboardReviewFormAdd },
  props: {
    reviews: {
      type: Array,
      default: null
    },
  },
  data() {
    return {
      selectedReview : {},
    }
  },
  methods: {
    editReview(item) {
      this.selectedReview = item;
    },
  },
};
</script>

<style>

</style>

<template>
  <div>
    <div class="d-md-flex justify-content-between px-3 mb-3">
      <h3 class="text-header">Review Management</h3> 
      <DashboardReviewFormAdd/>
    </div>
    <div class="d-flex row">
      <div 
        v-for="item in reviews" :key="item.id" 
        class="col-12 col-md-4 px-2 my-2"
      >
        <div class="card rounded h-100">
          <div class="d-flex flex-column card-body w-100">
            <div class="d-flex flex-column text-end mb-2">
              <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-review-modal" 
                  @click="editReview(item)">
                  <span class="mdi mdi-pencil"></span>
                </button>
              </div>
              <img 
                v-if="item.media[0]" 
                class="img img-fluid my-3" 
                :src="item.photo_path[0].url" 
                alt="review-image"
                style="max-height: 400px; max-width: 400px; object-fit: contain;"
              >
            </div>
            <div>
              <hr>
              <div class="text-header my-2" style="font-size:16px">
                <b>{{ item.reviewer_name }}</b>
              </div>
              <p class="text-area">{{ item.content }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <DashboardReviewFormEdit :selectedReview="selectedReview"></DashboardReviewFormEdit>
    <DeleteModal :url="'/reviews/'" :item="selectedReview" :type="'review ini'"/>
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

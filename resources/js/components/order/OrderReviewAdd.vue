<template>
  <div>
    <div class="modal fade" id="write-review-modal" tabindex="-1" aria-labelledby="write-review-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tulis Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3" >
              <label for="content">Review</label>
              <textarea 
                id="content"
                name="content"
                type="text-area" 
                class="form-control"
                v-model="form.content"
              ></textarea>
            </div>
            <div class="form-group mt-3">
              <label for="photo" class="form-label">Foto Review</label>
              <input 
                id="photo" 
                name="photo"
                ref="photo"
                accept="image/*"
                class="form-control" 
                type="file" 
              >
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" @click="doSubmit()">Tulis Review</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    selectedOrder: {
      type: Object,
      default: null
    },
  },
  data() {
    return {
      form: {
        content: null,
        photo_path: null,
        order_id: null,
        reviewer_id: null,
      },
    }
  },
  watch: {
    selectedOrder() {
      this.form.order_id == this.selectedOrder.id;
      this.form.reviewer_id == this.selectedOrder.user_id;  
    }
  },
  methods: {
    async doSubmit() {
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      formData.append("order_id", this.form.order_id);
      formData.append("reviewer_id", this.form.reviewer_id);
      if (photo) {
        formData.append("photo", photo);
      }
      formData.append("content", this.form.content);
      formData.append("_method", "put");
      try {
        let response = await axios.post(
          `/order/${this.form.order_id}/writeReview`,
          formData,
          {
            headers: {
              "Content-Type": "multipart/form-data",
            },
          }
        );
        return location.reload();
      } catch (error) {
        console.log(error.response);
      }
    },
  },
};
</script>
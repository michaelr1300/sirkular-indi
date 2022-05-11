<template>
  <div>
    <div class="modal fade" id="edit-review-modal" tabindex="-1" aria-labelledby="edit-review-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Review</h5>
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
            <div>
              <img 
                v-if="form.photo_path" 
                class="img img-fluid my-3" 
                :src="'/storage/' + form.photo_path" 
                alt="review-image"
              >
            </div>
            <div class="form-group mt-3">
              <input 
                id="name"
                name="name"
                type="hidden" 
                class="form-control"
                v-model="form.photo_path"
              >
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
            <button type="button" class="btn btn-danger" @click="doDelete()">Hapus</button>
            <button type="button" class="btn btn-primary" @click="doSubmit()">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    selectedReview: {
      type: Object,
      default: null
    },
  },
  data() {
    return {
      form: {
        id: null,
        content: null,
        photo_path: null,
      },
    }
  },
  watch: {
    selectedReview() {
      this.form = { ...this.selectedReview };  
    }
  },
  methods: {
    async doSubmit() {
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      formData.append("id", this.form.id);
      if (photo) {
        formData.append("photo", photo);
      }
      formData.append("content", this.form.content);
      formData.append("_method", "put");
      try {
        let response = await axios.post(
          `/reviews/${this.form.id}`,
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
    async doDelete() {
      try {
        let response = await axios.post(`/reviews/${this.form.id}`, {_method: 'delete'});
        return location.reload();
      } catch (error) {
        console.log(error.response);
      }
    }
  },
};
</script>

<style>

</style>

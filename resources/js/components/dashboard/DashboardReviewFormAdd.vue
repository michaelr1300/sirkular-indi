<template>
  <div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-review-modal">
      Tambah Review
      <span class="mdi mdi-plus"></span>
    </button>
    <div class="modal fade" id="add-review-modal" tabindex="-1" aria-labelledby="add-review-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Review</h5>
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
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="doSubmit()">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        content: null,
      },
    }
  },
  methods: {
    async doSubmit() {
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      formData.append("photo", photo);
      formData.append("content", this.form.content);
      try {
        let response = await axios.post(
          `/reviews`,
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
    }
  },
};
</script>

<style>

</style>

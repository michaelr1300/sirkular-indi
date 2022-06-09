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
              <label for="reviewer_name">Nama Pelanggan</label>
              <input 
                id="reviewer_name"
                name="reviewer_name"
                type="text-area" 
                class="form-control"
                v-model="form.reviewer_name"
              />
            </div>
            <div class="form-group mt-3" >
              <label for="content">Review</label>
              <div v-show="isError" class="text-danger">
                Isi review wajib diisi
              </div>
              <textarea 
                id="content"
                name="content"
                required
                type="text-area" 
                class="form-control"
                v-model="form.content"
              ></textarea>
            </div>
            <div class="form-group mt-3">
              <label for="photo" class="form-label">Foto Review</label>
              <div>
                <label
                  class="btn btn-outline-primary w-100 mx-auto"
                >
                  <input 
                    id="photo" 
                    name="photo"
                    ref="photo"
                    accept="image/*"
                    class="form-control" 
                    type="file" 
                    style="display: none"
                    @change="getFileName($event)"
                  >
                  Pilih File
                </label>
                {{ fileName }}
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" :disabled="isLoading" @click="doSubmit()">Simpan</button>
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
        reviewer_name: '',
        content: '',
      },
      isError: false,
      isLoading: false,
      fileName: '',
    }
  },
  methods: {
    async doSubmit() {
      this.isError = false;
      this.isLoading = true;
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      formData.append("photo", photo);
      formData.append("content", this.form.content);
      formData.append("reviewer_name", this.form.reviewer_name);
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
        this.isError = true;
        console.log(error.response);
      } finally {
        this.isLoading = false;
      }
    },
    getFileName(event){
      var fileData =  event.target.files[0];
      this.fileName = fileData.name;
    },
  },
};
</script>

<style>

</style>

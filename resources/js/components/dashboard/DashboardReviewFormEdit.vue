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
            <div class="form-group">
              <label for="reviewer_name">Nama Pelanggan</label>
              <input 
                id="reviewer_name"
                name="reviewer_name"
                type="text-area" 
                class="form-control"
                v-model="form.reviewer_name"
              />
            </div>
            <div class="form-group required-field mt-3" >
              <label for="content">Review</label>
              <div v-show="isError" class="text-danger">
                Isi review wajib diisi
              </div>
              <textarea 
                id="content"
                name="content"
                type="text-area" 
                class="form-control"
                :class="{ 'is-invalid': isError }"
                v-model="form.content" 
                required
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
                  Ubah Foto
                </label>
                {{ fileName }}
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button 
              class="btn btn-danger"
              :disabled="isLoading"
              data-bs-toggle="modal" 
              data-bs-target="#delete-modal"
            >
              Hapus
            </button>
            <button 
              class="btn btn-primary"
              :disabled="isLoading"
              @click="doSubmit()"
            >
              Simpan
            </button>
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
        reviewer_name: null,
        photo_path: null,
        media_id: null,
      },
      isError: false,
      isLoading: false,
      fileName: '',
    }
  },
  computed: {
    selectedImage() {
      if (this.selectedReview?.photo_path?.length) {
        return this.selectedReview.photo_path[0].url
      }
      return ''; 
    }
  },
  watch: {
    selectedReview() {
      this.form = { ...this.selectedReview, media_id: this.selectedReview?.media[0]?.id }; 
      this.fileName = '';
      this.$refs.photo.value = '';
    }
  },
  methods: {
    async doSubmit() {
      this.isLoading = true;
      this.isError = false;
      var photo = this.$refs.photo.files[0];
      let formData = new FormData();
      formData.append("id", this.form.id);
      if (photo) {
        formData.append("photo", photo);
      }
      formData.append("content", this.form.content ?? '');
      formData.append("reviewer_name", this.form.reviewer_name ?? '');
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
        this.isError = true;
        console.log(error.response);
      } finally {
        this.isLoading = false;
      }
    },
    async doDelete() {
      this.isLoading = true;
      this.isError = false;
      try {
        let response = await axios.post(`/reviews/${this.form.id}`, {_method: 'delete'});
        return location.reload();
      } catch (error) {
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

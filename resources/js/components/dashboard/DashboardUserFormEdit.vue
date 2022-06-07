<template>
  <div>
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="edit-user-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3" >
              <label for="reviewer_name">Nama</label>
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
                type="text-area" 
                class="form-control"
                v-model="form.content"
              ></textarea>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-primary" :disabled="isLoading" @click="doSubmit()">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    selectedUser: {
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
    }
  },
  watch: {
    selectedUser() {
      this.form = { ...this.selectedUser }; 
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
      formData.append("content", this.form.content);
      formData.append("reviewer_name", this.form.reviewer_name);
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
  },
};
</script>

<style>

</style>

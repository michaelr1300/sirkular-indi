<template>
  <div>
    <div class="modal fade" id="edit-review-modal" tabindex="-1" aria-labelledby="edit-review-modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="form-group mt-3" >
              <label for="name">Nama</label>
              <input 
                id="name"
                name="name"
                type="text" 
                class="form-control"
                v-model="form.name"
              >
            </div>
            <div class="form-group mt-3" >
              <label for="description">Deskripsi</label>
              <textarea 
                id="description"
                name="description"
                type="text-area" 
                class="form-control"
                v-model="form.description"
              ></textarea>
            </div>
            <div class="form-group mt-3" >
              <label for="price">Harga</label>
              <input 
                id="price"
                name="price"
                type="number"
                min=0 
                class="form-control"
                v-model="form.price"
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
        name: null,
        price: null,
        description: null,
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
      try {
        let response = await axios.put(`/dashboard/review/${this.form.id}`, this.form);
        alert("Review Updated");
        return location.reload();
      } catch (error) {
        console.log(error.response);
      }
    },
  },
};
</script>

<style>

</style>

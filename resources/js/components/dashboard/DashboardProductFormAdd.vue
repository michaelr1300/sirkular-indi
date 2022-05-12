<template>
  <div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-product-modal">
      Tambah Produk
      <span class="mdi mdi-plus"></span>
    </button>
    <div class="modal fade" id="add-product-modal" tabindex="-1" aria-labelledby="add-product-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Produk</h5>
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
  data() {
    return {
      form: {
        name: null,
        price: null,
        description: null,
      },
    }
  },
  methods: {
    async doSubmit() {
      try {
        let response = await axios.post("/dashboard/product", this.form);
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

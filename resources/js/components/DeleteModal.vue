<template>
  <div>
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="delete-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin akan menghapus {{ type }}?
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-primary px-2"
              style="min-width: 60px"
              @click="doDelete()"
              :disabled="isLoading"
            >
              Ya
            </button>
            <button type="button" class="btn btn-outline-primary mx-2 shadow" data-bs-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
    },
    url: {
      type: String,
    },
    item: {
      type: Object,
      default: null
    },
  },
  data() {
    return {
      isLoading: false,
    }
  },
  methods: {
    async doDelete() {
      this.isLoading = true;
      try {
        let response = await axios.post(`${this.url}${this.item.id}`, {_method: 'delete'});
        return location.reload();
      } catch (error) {
        console.log(error.response);
      } finally {
        this.isLoading = false;
      }
    },
  },
};
</script>
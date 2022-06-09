<template>
  <div>
    <div class="modal fade" id="update-order-modal" tabindex="-1" aria-labelledby="update-order-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Update Status Pesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah Anda yakin akan update status pesanan menjadi <b>{{ nextStatus }}</b>?
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-primary px-2"
              style="min-width: 60px"
              @click="updateStatus()"
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
    selectedItem: {
      type: Object,
      default: null
    },
  },
  data() {
    return {
      isLoading: false,
    }
  },
  computed: {
    nextStatus() {
      if (this.selectedItem.status == 'waiting') {
        return 'diterima oleh tim INDI-Circular';
      }
      if (this.selectedItem.status == 'confirm') {
        return 'diproses oleh tim INDI-Circular';
      }
      if (this.selectedItem.status == 'process') {
        return 'selesai diproses dan dikirim kembali ke pembeli';
      }
    },
  },
  methods: {
    async updateStatus() {
      this.isLoading = true;
      try {
        const response = await axios.post(`/order/${this.selectedItem.id}/updateStatus`);
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
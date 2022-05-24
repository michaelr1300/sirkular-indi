<template>
  <div>
    <div class="modal fade" id="preview-image-modal" tabindex="-1" aria-labelledby="preview-image-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div v-if="selectedItem.photo" class="d-flex">
              <div class="img-fluid">
                <img 
                  class="img my-3 mx-auto"
                  style="max-height: 800px; max-width: 100%; object-fit: contain;" 
                  :src="selectedItem.photo[0].url" 
                  alt="item-image"
                >
              </div>
            </div>
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
};
</script>
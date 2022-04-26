<template>
  <div class="mx-3">
    <h5 class="m-0">
      <div
        class="badge"
        :style="'white-space: normal; background-color: ' + backgroundColor + '; color: ' + color"
      >
        {{ statusText }}
      </div>
    </h5>
  </div>
</template>

<script>
export default {
  props: {
    status: {
      type: String,
      default: 'waiting',
    },
  },
  computed: {
    backgroundColor() {
      if (this.status == 'waiting') { return '#FFC107'; }
      if (this.status == 'confirm') { return 'orange'; }
      if (this.status == 'process') { return '#007BFF'; }
      if (this.status == 'finish') { return '#28A745'; }
      return '#FFC107';
    },
    color() {
      if (this.status == 'waiting') { return 'black'; }
      if (this.status == 'confirm') { return 'black'; }
      if (this.status == 'process') { return 'white'; }
      if (this.status == 'finish') { return 'white'; }
      return 'black';
    },
    statusText() {
      if (this.status == 'waiting') { return 'Menunggu Konfirmasi'; }
      if (this.status == 'confirm') { return 'Dikonfirmasi'; }
      if (this.status == 'process') { return 'Diproses'; }
      if (this.status == 'finish') { return 'Selesai'; }
      return '';
    },
  },

};
</script>

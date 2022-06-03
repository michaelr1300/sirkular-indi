<template>
  <a v-if="officeHour" href="https://api.whatsapp.com/send?phone=6282260945766" class="float-action-btn" target="_blank">
      <img class="icon-whatsapp" src="images/ic-whatsapp.svg" alt="ic-whatsapp">
  </a>
</template>

<script>
import { getTime, setHours, setMinutes, setSeconds } from 'date-fns'
export default {
  computed: {
    officeHour() {
      let start = new Date();
      start = setHours(start, 8);
      start = setMinutes(start, 0);
      start = setSeconds(start, 0);

      let end = new Date();
      end = setHours(end, 16);
      end = setMinutes(end, 0);
      end = setSeconds(end, 0);

      const now = getTime(new Date());
      if ( now >= getTime(start) && now <= getTime(end)) {
        return true;
      }
      return false;
    }
  },
}
</script>
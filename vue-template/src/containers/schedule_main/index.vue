<template>
  <div>
    <date-picker :date.sync="date" />
    <schedule :data="scheduleData" />
  </div>
</template>

<script>
import schedule from '../../components/schedule';
import datePicker from '../../components/date-picker';

const ONE_DAY = 1000 * 3600 * 24;
const ONE_HOUR = 1000 * 3600;
export default {
  name: 'schedule-main',
  components: {
    schedule,
    datePicker,
  },
  props: {
    scheduleRows: Array,
  },
  data() {
    return {
      date: new Date(),
    };
  },
  computed: {
    scheduleData() {
      return {
        startTime: this.date,
        endTime: new Date(this.date.getTime() + ONE_DAY),
        timeIncrement: ONE_HOUR,
        rows: this.scheduleRows,
      };
    },
  },
};
</script>


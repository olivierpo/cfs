<template>
  <div>
    <div class="row">
      <div class="col date-picker-col">
        <date-picker :date.sync="date" />
      </div>
    </div>
    <div class="row">
      <div class="col">
        <schedule :data="scheduleData" />
      </div>
    </div>
  </div>
</template>
<style scoped>
.date-picker-col {
  text-align: center;
}
</style>
<script>
import Schedule from '../../components/Schedule';
import DatePicker from '../../components/DatePicker';

const ONE_HOUR = 1000 * 3600;
export default {
  name: 'schedule-main',
  components: {
    Schedule,
    DatePicker,
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
        date: this.date,
        startHour: 9,
        endHour: 12 + 9,
        timeIncrement: ONE_HOUR,
        rows: this.scheduleRows,
      };
    },
  },
};
</script>


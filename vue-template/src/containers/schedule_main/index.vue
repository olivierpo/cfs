<template>
  <div>
    <div class="row">
      <div class="col col-centered">
        <div class="form-inline d-inline-block">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Building</span>
            </div>
            <search-bar :buildings="buildings" />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col col-centered">
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
.col-centered {
  display: flex;
  justify-content: center;
}
</style>
<script>
import Schedule from '../../components/Schedule';
import DatePicker from '../../components/DatePicker';
import SearchBar from '../../components/SearchBar';

const ONE_HOUR = 1000 * 3600;
export default {
  name: 'schedule-main',
  components: {
    Schedule,
    DatePicker,
    SearchBar,
  },
  props: {
    scheduleRows: Array,
    buildings: Array,
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


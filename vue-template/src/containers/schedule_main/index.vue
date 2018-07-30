<template>
  <div>
    <div class="row">
      <div class="col col-centered">
        <div class="form-inline d-inline-block">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Facility</span>
            </div>
            <search-bar :items="facilityList" :value="currentFacility" @input="changeCurrentFacility" />
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col col-centered">
        <date-picker :date="currentDate" @update:date="changeCurrentDate" />
      </div>
    </div>
    <div v-show="facilitySelected" class="row">
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
import { mapState, mapMutations } from 'vuex';

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
  data() {
    return {
    };
  },
  computed: {
    scheduleData() {
      const facility = this.facilities[this.currentFacility];
      const x = {
        date: this.currentDate,
        startHour: 9,
        endHour: 12 + 9,
        timeIncrement: ONE_HOUR,
        ...(this.facilitySelected && { rows: facility.rooms }),
      };
      return x;
    },
    ...mapState({
      facilityList: 'facilityList',
      facilities: 'facilities',
      currentDate: 'currentDate',
      currentFacility: 'currentFacility',
    }),
    facilitySelected() {
      return this.facilities[this.currentFacility] !== undefined;
    },
  },
  methods: {
    ...mapMutations({
      changeCurrentDate: 'changeCurrentDate',
      changeCurrentFacility: 'changeCurrentFacility',
    }),
  },
};
</script>

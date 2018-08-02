<template>
  <div class="form-inline d-inline-block">
    <div class="input-group">
      <div class="input-group-prepend">
        <button class="btn btn-primary" @click="updateDate(new Date(date.getTime() - 1000 * 3600 * 24))">Back</button>
      </div>
      <datepicker input-class="form-control" :value="date" @input="updateDate($event)"></datepicker>
      <div class="input-group-append">
        <button class="btn btn-primary" @click="updateDate(new Date(date.getTime() + 1000 * 3600 * 24))">Forward</button>
      </div>
    </div>
  </div>
</template>
<style scoped>
.root {
  display: inline-block;
}
</style>
<script>
import Datepicker from 'vuejs-datepicker';

export default {
  name: 'date-picker',
  props: {
    date: {
      type: Date,
      defaultValue: new Date(),
    },
  },
  methods: {
    updateDate(newDate) {
      this.$emit('update:date', newDate);
    },
  },
  components: {
    Datepicker,
  },
};
</script>


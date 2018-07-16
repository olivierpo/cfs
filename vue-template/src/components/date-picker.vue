<template>
  <div>
    <input type="date" :value="date && date.toISOString().split('T')[0]"
      @input="updateDate(new Date($event.target.valueAsDate))">
    <button @click="updateDate(new Date(date.getTime() - 1000 * 3600 * 24))">Back</button>
    <button @click="updateDate(new Date(date.getTime() + 1000 * 3600 * 24))">Forward</button>
  </div>
</template>
<script>
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
};
</script>


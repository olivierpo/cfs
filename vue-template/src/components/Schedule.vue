<template>
  <div class="root">
    <div class="header-intersection"></div>
    <div class="column-header-container">
      <template v-for="(time, index) in timeScale">
        <div class="column-header text-muted" :style="getGridStyles(1, index + 2)">
          {{ formatToHours(new Date(time)) }}
        </div>
      </template>
    </div>
    <template v-for="(row, index) in data.rows">
      <div class="row-header lead" :style="getGridStyles(index + 2, 1)">
        {{ row.name }}
      </div>
      <div :style="getGridStyles(index + 2, 2)" class="row-body" v-bind:class="{'row-body--first': index === 0}">
        <div class="row-cell-container">
          <div v-for="(time, timeIndex) in timeScale" class="cell"></div>
        </div>
        <div v-for="event in row.events" :style="getEventWrapStyles(event)" class="event-wrap">
          <div class="event" :style="getEventStyles()">
            <div class="event-text">
              {{ event.content }}
            </div>
          </div>
        </div>
      </div>
    </template>
  </div>
</template>
<script>
export default {
  name: 'schedule',
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  methods: {
    getGridStyles(row, column, columnEnd) {
      const result = {
        'grid-row-start': row,
        'grid-column-start': column,
      };
      if (columnEnd !== undefined) result['grid-column-end'] = columnEnd;
      return result;
    },
    getEventStyles() {
      return {
        'background-color': `hsl(${Math.round(Math.random() * 360)}, 100%, 80%)`,
      };
    },
    getEventWrapStyles(event) {
      const start = this.startTime.getTime();
      const range = (this.timeScale[this.timeScale.length - 1] + this.data.timeIncrement)
        - this.timeScale[0];
      return {
        'margin-left': this.toScaledPercent(event.startTime - start, range),
        'width': this.toScaledPercent(event.endTime - event.startTime, range),
        'min-width': this.toScaledPercent(event.endTime - event.startTime, range),
      };
    },
    toScaledPercent(x, range) {
      return ((x / range) * 100) + '%';
    },
    formatToHours(date) {
      return date.toLocaleString('en-US', { hour: 'numeric', hour12: true });
    },
  },
  computed: {
    startTime() {
      const result = new Date(this.data.date);
      result.setHours(this.data.startHour);
      result.setMinutes(0);
      result.setSeconds(0);
      return result;
    },
    endTime() {
      const result = new Date(this.data.date);
      result.setHours(this.data.endHour);
      result.setMinutes(0);
      result.setSeconds(0);
      return result;
    },
    timeScale() {
      const result = [];
      const start = this.startTime.getTime();
      const end = this.endTime.getTime();
      // The length is limited to prevent an infinite loop
      // which will mysteriosly bring down the entire app.
      for (let i = start; i <= end && result.length < 100; i += this.data.timeIncrement) {
        result.push(i);
      }
      return result;
    },
  },
};
</script>
<style scoped>
  .root {
    display: grid;
    grid-template-columns: auto 1fr;
    align-items: center;
    grid-column-gap: 1rem;
    grid-row-gap: 0;
  }
  .header-intersection {
    grid-column: 1;
    grid-row: 1;
  }
  .row-header {
    font-weight: bold;
    justify-self: end;
  }
  .column-header-container {
    grid-column: 2;
    grid-row: 1;
    display: flex;
  }
  .column-header {
    font-weight: bold;
    flex: 1;
  }
  .row-cell-container {
    display: flex;
    position: absolute;
    width: 100%;
    height: 100%;
  }

  /* This makes it so borders are not "doubled" between two cells. */
  .cell {
    border-right: 1px solid #AAA;
    border-bottom: 1px solid #AAA;
    flex: 1;
  }
  .cell:first-of-type {
    border-left: 1px solid #AAA;
  }
  .row-body.row-body--first .cell {
    border-top: 1px solid #AAA;
  }

  .row-body {
    position: relative;
    height: 3rem;
    overflow: hidden;
  }
  .event {
    padding: 0.75rem;
    z-index: 1;
    box-sizing: border-box;
    min-width: 100%;
    min-height: 100%;
    display: flex;
    align-items: center;
  }
  .event-text {
    white-space: nowrap;
  }
  .event-wrap {
    position: absolute;
    height: 3rem;
    overflow: hidden;
  }
  .event-wrap:hover {
    overflow: visible;
    width: auto !important;
    z-index: 2;
  }
</style>


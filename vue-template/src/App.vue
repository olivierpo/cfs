<template>
  <div>
    <div class="container">
      <schedule-main :scheduleRows="mockSchedule" :buildings="buildings" />
    </div>
  </div>
</template>
<style lang="scss">
@import './styles/custom-bootstrap.scss';
@import '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
<script>
import scheduleMain from './containers/schedule_main/index';

function hours(a) {
  const d = new Date();
  return new Date(d.getTime() + (a * 1000 * 3600));
}

export default {
  name: 'app',
  components: {
    scheduleMain,
  },
  data() {
    return {
      buildings: ['Cool Building', 'Coolest Building', 'Air-Conditioned Building'],
      mockSchedule: [
        {
          name: 'Room 1',
          events: [
            {
              startTime: hours(0),
              endTime: hours(5),
              content: 'Event 1',
            },
            {
              startTime: hours(6),
              endTime: hours(7),
              content: 'Event 1b',
            },
          ],
        },
        {
          name: 'Another Room 2',
          events: [
            {
              startTime: hours(1.5),
              endTime: hours(6),
              content: 'Event 2',
            },
          ],
        },
      ],
    };
  },
};
</script>


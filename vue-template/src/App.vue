<template>
  <div>
    <div class="container">
      <schedule-main />
    </div>
  </div>
</template>
<style lang="scss">
@import './styles/custom-bootstrap.scss';
@import '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
<script>
import scheduleMain from './containers/schedule_main/index';

export default {
  name: 'app',
  components: {
    scheduleMain,
  },
  data() {
    return {
    };
  },
};
</script>


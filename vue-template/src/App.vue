<template>
  <div>
    <AppNavbar/>
    <div class="container">
      <router-view/>
    </div>
    <AppFooter/>
  </div>
</template>
<style lang="scss">
@import './styles/custom-bootstrap.scss';
@import '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
<script>
import ScheduleMain from '@/containers/schedule_main/index';
import AppNavbar from '@/containers/app_navbar/index';
import AppFooter from '@/containers/app_footer/index';

export default {
  name: 'app',
  components: {
    ScheduleMain,
    AppNavbar,
    AppFooter,
  },
  data() {
    return {
    };
  },
};
</script>


import Vue from 'vue';
import Router from 'vue-router';

// import pages
import ScheduleMain from '@/containers/schedule_main';
import MainHome from '@/containers/main_home';
import ReserveMain from '@/containers/reserve_main';
import SearchMain from '@/containers/search_main';
import SearchResults from '@/containers/search_results';
import UserCreate from '@/containers/user_create';
import UserLogin from '@/containers/user_login';

Vue.use(Router);

// export new router instance
export default new Router({
  routes: [
    {
      path: '',
      name: 'main_home',
      component: MainHome,
    },
    {
      path: '/schedule',
      name: 'schedule_main',
      component: ScheduleMain,
    },
    {
      path: '/reserve',
      name: 'reserve_main',
      component: ReserveMain,
    },
    {
      path: '/search',
      name: 'search_main',
      component: SearchMain,
    },
    {
      path: '/search/results',
      name: 'search_results',
      component: SearchResults,
    },
    {
      path: '/account/login',
      name: 'user_login',
      component: UserLogin,
    },
    {
      path: '/account/create',
      name: 'user_create',
      component: UserCreate,
    },
  ],
});

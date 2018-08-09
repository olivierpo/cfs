import 'onsenui/css/onsenui.css';
import 'onsenui/css/onsen-css-components.css';

import Vue from 'vue';
import VueOnsen from 'vue-onsenui';
import store from './store/index';
import App from './App';
import router from './routers';

Vue.config.productionTip = false;

Vue.use(VueOnsen);

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  router,
  render: h => h(App),
});

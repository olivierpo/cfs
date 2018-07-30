import Vue from 'vue';
import Vuex from 'vuex';

import makeMockData from './mock-data';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    ...makeMockData(),
    currentDate: new Date(),
    currentFacility: '',
  },
  mutations: {
    changeCurrentFacility(state, newFacility) {
      state.currentFacility = newFacility;
    },
    changeCurrentDate(state, newDate) {
      state.currentDate = newDate;
    },
  },
});


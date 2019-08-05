import Vue from 'vue';
import Axios from 'axios';
import { VTooltip } from 'v-tooltip';
import Datepicker from 'vuejs-datepicker';
import VuejsDialog from 'vuejs-dialog';
import App from './App.vue';
import router from './router';
import store from './store';
import { getCookie } from './utils/cookie-utils';
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
import './main.css';

Vue.config.productionTip = false;
Axios.defaults.headers.post['X-XSRF-TOKEN'] = getCookie('XSRF-TOKEN')
Axios.interceptors.response.use(undefined, function (err) {
  if (err.status === 401 && err.config && !err.config.__isRetryRequest) {
    return router.push('/login');
  }
  throw err;
});

Vue.directive('tooltip', VTooltip)
Vue.component('datepicker', Datepicker);
Vue.use(VuejsDialog);

const createApp = async () => {
  await store.dispatch('auth/currentUser');
  new Vue({
    router,
    store,
    render: (h) => h(App),
  }).$mount('#app');
};

createApp();

import Vue from 'vue';
import Axios from 'axios';
import App from './App.vue';
import router from './router';
import store from './store';
import { getCookie } from './utils/cookie-utils';
import './main.css';

Vue.config.productionTip = false;
Axios.defaults.headers.post['X-XSRF-TOKEN'] = getCookie('XSRF-TOKEN')


const createApp = async () => {
  await store.dispatch('auth/currentUser');
  new Vue({
    router,
    store,
    render: (h) => h(App),
  }).$mount('#app');
};

createApp();

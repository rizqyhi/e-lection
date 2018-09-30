require('./bootstrap-app')
window.Vue = require('vue');

import App from './components/App.vue';
import LoadingIcon from './components/LoadingIcon.vue';

Vue.component('loading-icon', LoadingIcon);

const app = new Vue({
    el: '#app',
    render: h => h(App)
});

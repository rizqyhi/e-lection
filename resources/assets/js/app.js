require('./bootstrap-app')
window.Vue = require('vue');

import App from './components/App.vue';

const app = new Vue({
    el: '#app',
    render: h => h(App)
});

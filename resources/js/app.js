require('./bootstrap');
window.Vue = require('vue');

Vue.component('partner-component', require('./components/PartnerComponent.vue').default);

const app = new Vue({
    el: '#app',
});

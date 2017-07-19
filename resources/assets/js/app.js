require('./bootstrap');

window.Vue = require('vue');

window.moment = require('moment');

import Buefy from 'buefy';

Vue.use(Buefy);

Vue.component('ImageUpload', require('./components/ImageUpload.vue'));

Vue.component('AutoAddress', require('./components/AutoAddress.vue'));

Vue.component('VueDatetimePicker', require('./components/VueDatetimePicker.vue'));


// const app = new Vue({
//     el: '#app'
// });

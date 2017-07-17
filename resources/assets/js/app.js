require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';

Vue.use(Buefy);

Vue.component('ImageUpload', require('./components/ImageUpload.vue'));

// const app = new Vue({
//     el: '#app'
// });

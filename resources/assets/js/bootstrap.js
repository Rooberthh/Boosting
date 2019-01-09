window.Vue = require('vue');
window._ = require('lodash');
window.Popper = require('popper.js').default;
import VModal from 'vue-js-modal'


try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

window.events = new Vue();

Vue.use(VModal);

Vue.prototype.signedIn = window.App.signedIn;
Vue.prototype.user = window.App.user;

window.flash = function (message, level = 'success'){
    window.events.$emit('flash', {message, level});
}; // flash('my flash message')

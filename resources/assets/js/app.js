
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('boosting-pricing', require('./components/boostingPricing'));

Vue.component('flash-message', require('./components/flashMessage.vue'));
Vue.component('account-form', require('./components/accountOrderForm.vue'));
Vue.component('boosting-form', require('./components/boostingForm.vue'));
Vue.component('tile', require('./components/Tile'));

Vue.component('update-user-form', require('./components/updateUserForm'));
Vue.component('league-user-form', require('./components/leagueUserForm'));
Vue.component('support-ticket', require('./components/supportTicket'));

Vue.component('login', require('./components/login'));
Vue.component('register', require('./components/Register'));

Vue.component('user-notifications', require('./components/UserNotifications'));

Vue.component('boosting-orders', require('./components/pages/boosterOrders'));
Vue.component('booster-order', require('./components/boostingOrder'));
Vue.component('dashboard-boosting-order-row', require('./components/dashboardBoostingOrderRow'));
Vue.component('dashboard-boosting-orders-table', require('./components/dashboardBoostingOrdersTable'));

Vue.component('account-orders-table', require('./components/dashboardAccountOrderTable'));
Vue.component('account-order', require('./components/dashboardAccountOrderRow'));

const app = new Vue({
    el: '#app'
});

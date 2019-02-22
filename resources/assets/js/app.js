
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
Vue.component('boosting-pricing', require('./components/boostingPricing').default);

Vue.component('flash-message', require('./components/flashMessage.vue').default);
Vue.component('account-form', require('./components/accountOrderForm.vue').default);
Vue.component('boosting-form', require('./components/boostingForm.vue').default);
Vue.component('tile', require('./components/Tile').default);

Vue.component('update-user-form', require('./components/updateUserForm').default);
Vue.component('league-user-form', require('./components/leagueUserForm').default);
Vue.component('support-ticket', require('./components/supportTicket').default);

Vue.component('login', require('./components/Login').default);
Vue.component('register', require('./components/Register').default);

Vue.component('user-notifications', require('./components/UserNotifications').default);

Vue.component('boosting-orders', require('./components/pages/boosterOrders').default);
Vue.component('booster-order', require('./components/boostingOrder').default);

Vue.component('dashboard-boosting-order-row', require('./components/dashboardBoostingOrderRow').default);
Vue.component('dashboard-boosting-orders-table', require('./components/dashboardBoostingOrdersTable').default);
Vue.component('account-orders-table', require('./components/dashboardAccountOrderTable').default);
Vue.component('account-order', require('./components/dashboardAccountOrderRow').default);

const app = new Vue({
    el: '#app'
});

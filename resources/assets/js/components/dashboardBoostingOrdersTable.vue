<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>Start Rank</th>
                <th>Desired Rank</th>
                <th>Account</th>
                <th>Completed</th>
            </tr>
            </thead>
            <tbody v-for="order in orders">
                <dashboard-boosting-order-row :order="order" :key="order.id"></dashboard-boosting-order-row>
            </tbody>
            <tr v-show="empty">
                <td colspan="4">You haven't purchased any boosts. </td>
            </tr>
        </table>
    </div>
</template>

<script>
    import DashboardBoostingOrderRow from './dashboardBoostingOrderRow'
    export default {
        components: {
            DashboardBoostingOrderRow
        },
        data(){
            return {
                orders: {},
            }
        },

        mounted(){
            this.fetchData();
        },

        methods: {
            fetchData(){
                axios.get('/api/user/boostingOrders')
                    .then(response => {
                        this.orders = response.data
                    });
            },
        },

        computed: {
            empty(){
               if(this.orders.length > 0){
                   return false;
               } else {
                   return true;
               }
            }
        }
    }
</script>

<style scoped>

</style>

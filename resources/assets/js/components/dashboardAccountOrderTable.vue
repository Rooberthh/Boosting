<template>
        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Server</th>
            </tr>
            </thead>

            <tbody v-for="order in orders">
                <account-order :order="order" :key="order.id" v-show="!empty"></account-order>
            </tbody>
            <tr v-show="empty">
                <td colspan="3">You haven't purchased any accounts. </td>
            </tr>
        </table>
</template>

<script>
    export default {
        data(){
            return {
                orders: {},
                loading: true
            }
        },

        mounted(){
            this.fetchData();
        },

        methods: {
            fetchData(){
                axios.get('/api/user/accountOrders')
                    .then(response => {
                      this.orders = response.data
                    });
            }
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

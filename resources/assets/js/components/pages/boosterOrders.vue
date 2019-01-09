<template>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>User</th>
                <th>From</th>
                <th>To</th>
                <th>Server</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody v-for="order in orders">
                <boosting-order :order="order" :key="order.id"></boosting-order>
            </tbody>
        </table>
    </div>
</template>

<script>
    import boostingOrder from '../boostingOrder'
    export default {
        props: ['orders'],
        components: {
            boostingOrder
        }
    }
</script>


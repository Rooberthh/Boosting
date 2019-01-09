<template>
    <tr>
        <td> {{ order.owner.name }} </td>
        <td> {{ getDivision(order.from) }}</td>
        <td> {{ getDivision(order.to) }}</td>
        <td> {{ order.server }}</td>
        <td>
            <button class="button is-primary is-small" @click="acceptOrder">Accept</button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: ['order'],
        data(){
            return {
                id: this.order.id,
                errors: {}
            }
        },
        methods: {
            acceptOrder()
            {
                axios.patch('/booster/orders/' + this.id, {id: this.id})
                .then(response => {
                    window.flash(response.data);
                    location.reload();
                })
                .catch(error => {
                    window.flash(error.response.data, 'danger');
                })
            },
            getDivision(number)
            {
                let divisions = [
                    'Bronze 5','Bronze 4','Bronze 3','Bronze 2','Bronze 1',
                    'Silver 5','Silver 4','Silver 3','Silver 2','Silver 1',
                    'Gold 5', 'Gold 4', 'Gold 3', 'Gold 2', 'Gold 1',
                    'Platinum 5', 'Platinum 4', 'Platinum 3', 'Platinum 2', 'Platinum 1',
                    'Diamond 4', 'Diamond 5', 'Diamond 3', 'Diamond 2', 'Diamond 1',
                ];

                return divisions[number];
            }
        }
    }
</script>

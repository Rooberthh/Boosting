<template>
    <tr>
        <td> {{ order.account.username }} </td>
        <td> {{ order.account.password }} </td>
        <td> {{ order.account.server }} </td>
    </tr>
</template>
<script >
    export default {
        props: ['order'],
        data(){
            return {
                id: this.order.id,
                errors: {}
            }
        }
    }
</script>

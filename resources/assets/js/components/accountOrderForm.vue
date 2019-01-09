<template>
    <div>
        <form action="/account" method="POST" @submit.prevent>
            <input type="hidden" name="stripeToken" v-model="stripeToken">
            <input type="hidden" name="stripeEmail" v-model="stripeEmail">

            <div class="field">
                <label class="label" for="server">Server</label>
                <div class="select">
                    <select id="server" name="server" v-model="server" @change="fetch">
                        <option value="eune">EUNE</option>
                        <option value="euw">EUW</option>
                        <option value="na">NA</option>
                        <option value="tr">TR</option>
                        <option value="oce">OCE</option>
                        <option value="lan">LAN</option>
                        <option value="las">LAS</option>
                    </select>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <p class="label">Blue Essence</p>
                    <label class="radio">
                        <input type="radio" name="amountIp" value="20000" v-model.number="amountIp" @change="fetch()">
                        20000
                    </label>
                    <label class="radio">
                        <input type="radio" name="amountIp" value="30000" v-model.number="amountIp" @change="fetch()">
                        30000
                    </label>
                </div>
            </div>

            <p v-text="price"></p>
            <p v-cloak>Number of accounts: {{ accounts }}</p>
            <div v-if="accounts !== 0 && accounts !== 'Loading...'">
                <button class="btn btn-danger" @click="buy">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                stripeEmail: '',
                stripeToken: '',
                server: 'eune',
                amountIp : 20000,
                status: false,
                accounts: 0
            }
        },

        created(){
            this.stripe = StripeCheckout.configure({
                key: Boosting.stripeKey,
                image: "https://stripe.com/img/documentation/checkout/marketplace.png",
                locale: "auto",
                token: (token) => {
                    this.stripeToken = token.id;
                    this.stripeEmail = token.email;

                    axios.post('/account', this.$data)
                        .then(() => {
                            this.$modal.show('order-created');
                        })
                        .catch(error => {
                            this.status = error.response.data.status
                        });

                }
            })
        },
        computed: {
            price() {
                return "Total cost: " + this.amountIp / 1000 + "$"
            }
        },
        mounted(){
            this.fetch();
        },
        methods: {
            buy() {
                this.stripe.open({
                    name: 'Purchase Account',
                    zipCode: true,
                    amount: this.calc(this.amountIp),
                    description: 'We do not refund payments'
                });
            },
            calc(ip)
            {
                return (ip / 10);
            },

            fetch()
            {
                this.accounts = "Loading...";

                axios.get('/api/accounts', {
                    params:  {
                        server: this.server,
                        ip: this.amountIp
                    }
                })
                .then(response => {
                    this.accounts = response.data;
                });
            }
        }
    }
</script>

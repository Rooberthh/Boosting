<template>
    <div>
        <form action="/boosting" method="POST" @submit.prevent>
            <div class="columns is-horizontal is-gapless">
                <div class="column">
                    <div class="field">
                        <label class="label" for="from">From</label>
                        <div class="control">
                        <span class="select">
                            <select name="from" id="from" v-model.number="from">
                                <option value="1">Bronze 5</option>
                                <option value="2">Bronze 4</option>
                                <option value="3">Bronze 3</option>
                                <option value="4">Bronze 2</option>
                                <option value="5">Bronze 1</option>
                                <option value="6">Silver 5</option>
                                <option value="7">Silver 4</option>
                                <option value="8">Silver 3</option>
                                <option value="9">Silver 2</option>
                                <option value="10">Silver 1</option>
                                <option value="11">Gold 5</option>
                                <option value="12">Gold 4</option>
                                <option value="13">Gold 3</option>
                                <option value="14">Gold 2</option>
                                <option value="15">Gold 1</option>
                                <option value="16">Platinum 5</option>
                                <option value="17">Platinum 4</option>
                                <option value="18">Platinum 3</option>
                                <option value="19">Platinum 2</option>
                                <option value="20">Platinum 1</option>
                                <option value="21">Diamond 5</option>
                                <option value="22">Diamond 4</option>
                                <option value="23">Diamond 3</option>
                                <option value="24">Diamond 2</option>
                                <option value="25">Diamond 1</option>
                            </select>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label" for="to">To</label>
                        <div class="control">
                        <span class="select">
                            <select name="to" id="to" v-model.number="to">
                                <option value="1">Bronze 5</option>
                                <option value="2">Bronze 4</option>
                                <option value="3">Bronze 3</option>
                                <option value="4">Bronze 2</option>
                                <option value="5">Bronze 1</option>
                                <option value="6">Silver 5</option>
                                <option value="7">Silver 4</option>
                                <option value="8">Silver 3</option>
                                <option value="9">Silver 2</option>
                                <option value="10">Silver 1</option>
                                <option value="11">Gold 5</option>
                                <option value="12">Gold 4</option>
                                <option value="13">Gold 3</option>
                                <option value="14">Gold 2</option>
                                <option value="15">Gold 1</option>
                                <option value="16">Platinum 5</option>
                                <option value="17">Platinum 4</option>
                                <option value="18">Platinum 3</option>
                                <option value="19">Platinum 2</option>
                                <option value="20">Platinum 1</option>
                                <option value="21">Diamond 5</option>
                                <option value="22">Diamond 4</option>
                                <option value="23">Diamond 3</option>
                                <option value="24">Diamond 2</option>
                                <option value="25">Diamond 1</option>
                            </select>
                        </span>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <div class="field">
                        <label class="label" for="server">Server</label>
                        <div class="control">
                        <span class="select">
                            <select name="server" id="server" v-model="server">
                                <option value="eune">EUNE</option>
                                <option value="euw">EUW</option>
                                <option value="na">NA</option>
                                <option value="tr">TR</option>
                                <option value="oce">OCE</option>
                                <option value="lan">LAN</option>
                                <option value="las">LAS</option>
                            </select>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="control" v-if="check">
                <p>Price is: {{ price }}$</p>
                <button class="button is-primary" @click="buy">Submit</button>
            </div>
            <div class="control" v-else>
                <p>Invalid start.</p>
            </div>
        </form>
        <p class="alert alert-danger" v-show="status" v-text="status"></p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                stripeEmail: '',
                stripeToken: '',
                from: 1,
                to: 1,
                server: 'eune',

                status: false,
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

                    axios.post('/purchase', this.$data)
                        .then(() => {
                            this.$modal.show('order');
                        })
                        .catch(error => {
                            window.flash(error.response.data.status, 'danger')
                        });

                }
            })
        },
        computed: {
            price() {
                return "Total cost: " + this.cost
            },

            cost()
            {
                return this.calc(this.from, this.to) / 100;
            },

            check()
            {
                if (this.from < this.to){
                    return true;
                }
            }
        },
        methods: {
            buy() {
                this.stripe.open({
                    name: 'Purchase Boost',
                    zipCode: true,
                    amount: this.calc(this.from, this.to),
                    description: 'We do not refund payments'
                });
            },
            calc(from, to)
            {
                let totalPrice = 0;
                for(let i = from; i < to; i++ ){
                    if( i <= 5)
                    {
                        totalPrice = totalPrice + 1200;
                    }
                    else if( i >= 5 && i <= 10)
                    {
                        totalPrice = totalPrice + 1400
                    }
                    else if( i >= 10 && i <= 15)
                    {
                        totalPrice = totalPrice + 2300
                    }
                    else if( i >= 15 && i <= 20)
                    {
                        totalPrice = totalPrice + 3700
                    }
                    else if( i >= 20 && i <= 25)
                    {
                        totalPrice = totalPrice + 11300
                    }
                }

                return totalPrice;
            }
        }
    }
</script>

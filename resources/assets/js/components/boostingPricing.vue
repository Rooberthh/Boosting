<template>
    <div>
        <div class="field">
            <div class="control is-expanded">
                    <div class="select is-fullwidth">
                        <select class="is-expanded" name="from" id="from" v-model.number="from">
                            <option value="1" selected="selected" disabled>From</option>
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
                    </div>
            </div>
        </div>

        <div class="field">
            <div class="control is-expanded">
                    <div class="select is-fullwidth">
                        <select name="to" id="to" v-model.number="to">
                            <option value="1" selected="selected" disabled>To</option>
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
                    </div>
            </div>
        </div>

        <div class="control has-text-centered" v-if="check">
            <p>{{ price }}$</p>
            <a href="#" @click="$modal.show('login')" class="button is-danger w-100">Log In To Purchase</a>
        </div>

        <div class="control has-text-centered" v-else>
            <p>Invalid start.</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                from: 1,
                to: 1,
            }
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

<style scoped>

</style>

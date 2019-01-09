<template>
    <div class="alert flash-message" :class="'alert-'+level" role="alert" v-show="show">
        {{ body }}
    </div>
</template>

<script type="text/javascript">
    export default {
        props:['message'],

        data()
        {
            return {
                body: this.message,
                level: 'success',
                show: false
            }
        },
        created()
        {
            if(this.message)
            {
                this.flash();
            }

            window.events.$on(
                'flash', data => {
                    this.flash(data);
                });
        },

        methods: {
            flash(data) {
                if(data){
                    this.body = data.message;
                    this.level = data.level;
                }

                this.show = true;
                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 3000);
            }
        }
    };
</script>

<style type="text/css">
    .flash-message {
        position: fixed !important;
        bottom: 25px;
        right: 25px;
    }
</style>


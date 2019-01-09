<script>
    export default {
        data() {
            return {
                errors: {},
                form: {
                    from: '',
                    body: '',
                    name: ''
                },
                submitted: false
            };
        },
        methods: {
            cancel(){
                this.$modal.hide('support-ticket');

                this.resetForm();
            },

            sendTicket()
            {
                this.submitted = true;

                axios.post('/support', {
                    from: this.form.from,
                    body: this.form.body,
                    name: this.form.name
                })
                .then(() => {
                    this.$modal.hide('support-ticket');
                    this.$modal.show('ticket-created');

                    this.resetForm();
                })
                .catch(error => {
                    console.log(error.response.data);
                    this.errors = error.response.data.errors;
                });
            },

            resetForm()
            {
                this.errors = {};
                this.form = {};
                this.submitted = false;
            }
        }
    }
</script>

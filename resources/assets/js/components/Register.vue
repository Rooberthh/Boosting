<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                feedback: '',
                loading: false,
                errors: {}
            };
        },
        methods: {
            register()
            {
                this.loading = true;

                axios.post('/register', this.form)
                    .then(() => location.reload())
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        this.loading = false;
                    });
            }
        }
    }
</script>


<script>
    export default {
        props: ['user'],
        data() {
            return {
                form: {
                    name: this.user.name,
                    email: this.user.email,
                    password: '',
                    password_confirmation: ''
                },
                errors: {}
            };
        },
        methods: {
            onSubmit()
            {
                axios.patch('/profile', {
                    name: this.form.name,
                    email: this.form.email,
                    password: this.form.password,
                    password_confirmation: this.form.password_confirmation
                })
                .then(() => {
                    this.$modal.show('updated-user');
                    location.reload();
                }).catch(error => {
                    this.errors = error.response.data.errors;
                });
            }
        }

    }
</script>


<script>
    export default {
        props: ['user'],
        data() {
            return {
                form: {
                    league_name: this.user.league_name,
                    league_password: ''
                },
                errors: {}
            };
        },
        methods: {
            onSubmit()
            {
                axios.patch('/profile/league', {
                    league_name: this.form.league_name,
                    league_password: this.form.league_password
                })
                .then(() => {
                    this.$modal.show('updated-user');
                    location.reload();
                }).catch(error => {
                   this.errors = error.response.data;
                });
            }
        }
    }
</script>

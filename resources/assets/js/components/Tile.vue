<template>
    <div class="card">
        <div class="p-3">
            <div class="d-flex">
                <slot name="body" />
                <slot name="icon" />
            </div>
            <h2 v-text="data"></h2>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['url'],
        data() {
            return {
                data: 'Loading...'
            };
        },
        mounted()
        {
            axios.get(this.url)
                .then(response => {
                    this.data = response.data;
                })
        }
    };
</script>

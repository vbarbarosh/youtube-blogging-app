<template>
    <div>
        page-articles-remove
        <pre>{{ value }}</pre>
        <div>
            <button-danger v-on:click="click_button_delete">
                Delete
            </button-danger>
            <button-warning v-on:click="click_button_cancel">
                Cancel
            </button-warning>
        </div>
    </div>
</template>

<script>
    import api_articles_remove from '../../helpers/api/api_articles_remove';

    const page_articles_remove = {
        props: ['value'],
        methods: {
            click_button_delete: async function () {
                await api_articles_remove(this.value);
                this.$router.currentRoute.params.retval = true;
                this.$router.back();
            },
            click_button_cancel: async function () {
                this.$router.back();
            },
        }
    };

    export default page_articles_remove;
</script>

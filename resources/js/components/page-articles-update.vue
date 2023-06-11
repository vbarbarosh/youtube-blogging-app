<template>
    <div>
        <h2>Update Article</h2>
        <form-article v-bind:value="value" />
        <div>
            <button-primary v-on:click="click_button_save">
                Save
            </button-primary>
            <button-warning v-on:click="click_button_cancel">
                Cancel
            </button-warning>
        </div>
    </div>
</template>

<script>
    import api_articles_update from '../helpers/api/api_articles_update';

    const page_articles_update = {
        props: ['value'],
        methods: {
            click_button_save: async function () {
                await api_articles_update(this.value);
                this.$router.currentRoute.params.retval = true;
                this.$router.back();
            },
            click_button_cancel: function () {
                this.$router.back();
            },
        },
    };

    export default page_articles_update;
</script>

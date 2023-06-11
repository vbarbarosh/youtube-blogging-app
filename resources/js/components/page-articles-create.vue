<template>
    <div>
        <h2>Create Article</h2>
        <form-article v-bind:value="value" />
        <div>
            <button-primary v-on:click="click_button_create">
                Create
            </button-primary>
            <button-warning v-on:click="click_button_cancel">
                Cancel
            </button-warning>
        </div>
    </div>
</template>

<script>
    import api_articles_create from '../helpers/api/api_articles_create';

    const page_articles_create = {
        props: ['value'],
        methods: {
            click_button_create: async function () {
                await api_articles_create(this.value);
                this.$router.back();
            },
            click_button_cancel: function () {
                this.$router.back();
            },
        },
    };

    export default page_articles_create;
</script>

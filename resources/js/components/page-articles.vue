<template>
    <div>
        <button-primary v-on:click="click_create">Create New Article</button-primary>
        <table class="table">
        <thead>
        <tr>
            <th>title</th>
            <th>created</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in items" v-bind:key="item.uid">
            <td>{{ item.title }}</td>
            <td>{{ item.created_at }}</td>
            <td>
                <button-danger v-on:click="click_remove(item)">Remove</button-danger>
            </td>
        </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
    import api_articles_create from '../helpers/api/api_articles_create';
    import api_articles_list from '../helpers/api/api_articles_list';
    import api_articles_remove from '../helpers/api/api_articles_remove';

    const page_articles = {
        data: function () {
            return {
                items: [],
            };
        },
        methods: {
            refresh: async function () {
                this.items = await api_articles_list();
            },
            click_create: async function () {
                await api_articles_create({});
                await this.refresh();
            },
            click_remove: async function (item) {
                await api_articles_remove(item);
                await this.refresh();
            },
        },
        created: async function () {
            await this.refresh();
        }
    };

    export default page_articles;
</script>

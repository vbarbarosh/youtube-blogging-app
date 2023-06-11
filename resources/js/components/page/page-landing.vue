<template>
    <div>
        <table class="table">
        <thead>
        <tr>
            <th>uid</th>
            <th>title</th>
            <th>published_at</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in published_articles" v-bind:key="item.uid">
            <td>{{ item.uid }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.published_at }}</td>
        </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
    import api_articles_list_published from '../../helpers/api/api_articles_list_published';

    const page_landing = {
        data: function () {
            return {
                published_articles: [],
            };
        },
        methods: {
            refresh: async function () {
                this.published_articles = await api_articles_list_published();
            },
        },
        created: async function () {
            await this.refresh();
        }
    };

    export default page_landing;
</script>

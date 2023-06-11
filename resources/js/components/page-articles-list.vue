<template>
    <div>
        <router-link to="/new">
            <button-primary>
                Create New Article
            </button-primary>
        </router-link>
        <table class="table">
        <thead>
        <tr>
            <th>uid</th>
            <th>title</th>
            <th>published</th>
            <th>created</th>
            <th>actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in items" v-bind:key="item.uid">
            <td>{{ item.uid }}</td>
            <td>
                <router-link v-bind:to="`/${item.uid}`">
                    {{ item.title }}
                </router-link>
            </td>
            <td>
                <badge-success v-if="item.is_published">Published</badge-success>
            </td>
            <td>{{ item.created_at }}</td>
            <td>
                <router-link v-bind:to="`/${item.uid}/delete`">
                    <button-danger>
                        Remove
                    </button-danger>
                </router-link>
            </td>
        </tr>
        </tbody>
        </table>
    </div>
</template>

<script>
    import api_articles_list from '../helpers/api/api_articles_list';

    const page_articles_list = {
        data: function () {
            return {
                is_loading: false,
                items: [],
            };
        },
        beforeRouteEnter: function (to, from, next) {
            next(function (vm) {
                if (from.params.retval && !vm.is_loading) {
                    vm.refresh();
                }
            });
        },
        methods: {
            refresh: async function () {
                this.is_loading = true;
                this.items = await api_articles_list().finally(() => this.is_loading = false);
            },
        },
        created: async function () {
            await this.refresh();
        }
    };

    export default page_articles_list;
</script>

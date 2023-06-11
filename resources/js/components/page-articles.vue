<template>
    <keep-alive>
        <router-view />
    </keep-alive>
</template>

<script>
    import Vue from 'vue';
    import VueRouter from 'vue-router';
    import api_articles_fetch from '../helpers/api/api_articles_fetch';
    import page_articles_create from './page-articles-create';
    import page_articles_list from './page-articles-list';
    import page_articles_remove from './page-articles-remove';
    import page_articles_update from './page-articles-update';

    const routes = [
        {path: '/', component: page_articles_list},
        {path: '/new',component: page_articles_create, props: true},
        {path: '/:article_uid', component: page_articles_update, props: true},
        {path: '/:article_uid/delete', component: page_articles_remove, props: true},
    ];

    const router = new VueRouter({routes});
    router.beforeResolve(async function (to, from, next) {
        if (to.path === '/new') {
            const reactive = new Vue({data: {article: {title: 'New Article', body: 'Some body here...'}}});
            to.params.value = reactive.article;
        }
        else if (to.params.article_uid) {
            const article = await api_articles_fetch({uid: to.params.article_uid});
            const reactive = new Vue({data: {article}});
            to.params.value = reactive.article;
            delete to.params.article_uid;
        }
        next();
    });

    const page_articles = {
        router,
    };

    export default page_articles;
</script>

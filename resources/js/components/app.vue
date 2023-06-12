<template>
    <div>
        <app-nav />
        <keep-alive>
            <router-view />
        </keep-alive>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VueRouter from 'vue-router';
    import api_articles_fetch from '../helpers/api/api_articles_fetch';
    import page_articles_create from './page/page-articles-create.vue';
    import page_articles_list from './page/page-articles-list.vue';
    import page_articles_remove from './page/page-articles-remove.vue';
    import page_articles_update from './page/page-articles-update.vue';
    import page_landing from './page/page-landing';
    import page_auth_login from './page/page-auth/page-auth-login';
    import page_auth_logout from './page/page-auth/page-auth-logout';
    import page_auth_register from './page/page-auth/page-auth-register';
    import page_auth_password_recovery_step1 from './page/page-auth/page-auth-password-recovery-step1';
    import page_auth_password_recovery_step2 from './page/page-auth/page-auth-password-recovery-step2';

    const routes = [
        {path: '/', component: page_landing},
        {path: '/login', component: page_auth_login},
        {path: '/logout', component: page_auth_logout},
        {path: '/register', component: page_auth_register},
        {path: '/password-recovery', component: page_auth_password_recovery_step1},
        {path: '/password-recovery/:token', component: page_auth_password_recovery_step2},
        {path: '/dashboard', component: page_articles_list},
        {path: '/dashboard/new',component: page_articles_create, props: true},
        {path: '/dashboard/:article_uid', component: page_articles_update, props: true},
        {path: '/dashboard/:article_uid/delete', component: page_articles_remove, props: true},
    ];

    const router = new VueRouter({routes, mode: 'history'});
    router.beforeResolve(async function (to, from, next) {
        console.log(to.path);
        if (to.path === '/dashboard/new') {
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

    const app = {
        router,
    };

    export default app;
</script>

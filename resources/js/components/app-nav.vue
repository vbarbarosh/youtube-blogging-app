<template>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blogging App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link to="/" v-bind:class="{active: is_landing_active}" class="nav-link">Landing</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/dashboard" v-bind:class="{active: is_dashboard_active}" class="nav-link">Dashboard</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    const app_nav = {
        computed: {
            is_landing_active: function () {
                console.log('is_landing_active', this.$route);
                return this.$route.path === '/';
            },
            is_dashboard_active: function () {
                return this.$route.path.startsWith('/dashboard');
            },
        }
    };

    export default app_nav;
</script>

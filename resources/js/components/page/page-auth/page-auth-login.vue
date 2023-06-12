<template>
    <form v-on:submit.prevent="submit">
        <form-auth-login v-model="form" />
        <button-primary type="submit">Login</button-primary>
        <router-link to="/register">
            <button-link>Register</button-link>
        </router-link>
        <router-link to="/password-recovery">
            <button-link>Forgot password?</button-link>
        </router-link>
    </form>
</template>

<script>
    import api_auth_login from '../../../helpers/api/auth/api_auth_login';

    const page_auth_login = {
        data: function () {
            return {
                form: {
                    email: null,
                    password: null,
                }
            };
        },
        methods: {
            submit: async function () {
                await api_auth_login(this.form);
                window.location.reload();
            },
        },
    };

    export default page_auth_login;
</script>

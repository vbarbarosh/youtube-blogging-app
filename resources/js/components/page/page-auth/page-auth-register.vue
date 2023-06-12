<template>
    <form v-on:submit.prevent="submit">
        <form-auth-register v-model="form" />
        <button-primary v-bind:disabled="is_disabled" type="submit">
            Register
        </button-primary>
    </form>
</template>

<script>
    import api_auth_register from '../../../helpers/api/auth/api_auth_register';

    const page_page_register = {
        data: function () {
            return {
                form: {
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
            };
        },
        computed: {
            is_disabled: function () {
                return !this.form.password || (this.form.password !== this.form.password_confirmation);
            },
        },
        methods: {
            submit: async function () {
                await api_auth_register(this.form);
                window.location.reload();
            },
        },
    };

    export default page_page_register;
</script>

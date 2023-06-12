<template>
    <form v-on:submit="submit">
        <form-auth-password-recovery v-model="form" />
        <button-primary>Submit</button-primary>
    </form>
</template>

<script>
    import api_auth_register from '../../../helpers/api/auth/api_auth_register';

    const page_auth_password_recovery = {
        data: function () {
            return {
                form: {
                    email: '',
                },
            };
        },
        methods: {
            submit: async function () {
                await api_auth_password_recovery();
            },
        }
    };

    export default page_auth_password_recovery;
</script>

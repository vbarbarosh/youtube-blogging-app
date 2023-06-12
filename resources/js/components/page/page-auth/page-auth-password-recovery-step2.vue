<template>
    <form v-on:submit.prevent="submit">
        <form-auth-password-recovery-step2 v-model="form" />
        <button-primary v-bind:disabled="is_disabled" type="submit">
            Submit
        </button-primary>
    </form>
</template>

<script>
    import api_auth_password_recovery_step2 from '../../../helpers/api/auth/api_auth_password_recovery_step2';
    import api_users_me from '../../../helpers/api_users_me';

    const page_auth_password_recovery_step2 = {
        data: function () {
            return {
                form: {
                    email: null,
                    token: null,
                    password: '',
                    password_confirmation: '',
                },
            };
        },
        computed: {
            is_disabled: function () {
                return this.form.password !== this.form.password_confirmation;
            },
        },
        methods: {
            submit: async function () {
                await api_auth_password_recovery_step2(this.form);
                window.location.replace('/');
            },
        },
        created: function () {
            this.form.email = this.app.password_recovery_email;
            this.form.token = this.app.password_recovery_token;
        },
    };

    export default page_auth_password_recovery_step2;
</script>

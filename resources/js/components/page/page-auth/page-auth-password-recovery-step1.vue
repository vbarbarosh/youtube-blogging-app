<template>
    <form v-on:submit.prevent="submit">
        <div v-if="was_sent">
            Please check your email
        </div>
        <template v-else>
            <form-auth-password-recovery-step1 v-model="form" />
            <button-primary v-bind:disabled="is_disabled" type="submit">
                Submit
            </button-primary>
        </template>
    </form>
</template>

<script>
    import api_auth_password_recovery_step1 from '../../../helpers/api/auth/api_auth_password_recovery_step1';

    const page_auth_password_recovery_step1 = {
        data: function () {
            return {
                form: {
                    email: '',
                },
                was_sent: false,
            };
        },
        computed: {
            is_disabled: function () {
                return !this.form.email;
            },
        },
        methods: {
            submit: async function () {
                await api_auth_password_recovery_step1(this.form);
                this.was_sent = true;
            },
        },
    };

    export default page_auth_password_recovery_step1;
</script>

<template>
    <div>
        <input-plaintext v-model="value.email" label="Email" />
        <input-password v-model="value.password" label="New Password" />
        <input-password v-model="value.password_confirmation" label="Confirm New Password" />
    </div>
</template>

<script>
    const form_auth_password_recovery_step2 = {
        props: ['value'],
    };

    export default form_auth_password_recovery_step2;
</script>

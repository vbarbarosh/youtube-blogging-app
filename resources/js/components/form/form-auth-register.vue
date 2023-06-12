<template>
    <div>
        <input-email v-model="value.email" />
        <input-password v-model="value.password" />
        <input-password v-model="value.password_confirmation" label="Confirm password" />
    </div>
</template>

<script>
    const form_auth_register = {
        props: ['value'],
    };

    export default form_auth_register;
</script>

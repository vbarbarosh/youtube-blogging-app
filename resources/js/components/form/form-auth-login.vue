<template>
    <div>
        <input-email v-model="value.email" />
        <input-password v-model="value.password" />
    </div>
</template>

<script>
    const form_auth_login = {
        props: ['value'],
    };

    export default form_auth_login;
</script>

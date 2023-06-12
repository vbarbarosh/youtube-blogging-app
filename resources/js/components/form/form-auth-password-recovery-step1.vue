<template>
    <div>
        <input-email v-model="value.email" />
    </div>
</template>

<script>
    const form_auth_password_recovery = {
        props: ['value'],
    };

    export default form_auth_password_recovery;
</script>

<template>
    <div>
        <button-danger v-on:click="click_button_logout">Logout</button-danger>
    </div>
</template>

<script>
    import api_auth_logout from '../../../helpers/api/auth/api_auth_logout';

    const page_auth_logout = {
        methods: {
            click_button_logout: async function () {
                await api_auth_logout();
                window.location.reload();
            },
        },
    };

    export default page_auth_logout;
</script>
